# Texture · Shader Viewer

A single-page app that layers a random texture image under a random
GLSL shader effect, entirely in the browser. No server, no build step,
no upload — your files never leave your machine.

## Running it

Just open `index.html` in Chrome or Edge (folder selection needs the
`webkitdirectory` API, which those two support; Firefox and Safari
don't implement it yet). Double-clicking the file works fine, since
everything runs off local `File` objects — no `fetch`, no CORS issues.

1. Click **Textures folder** and select the folder containing your images.
2. Click **Shaders folder** and select the folder containing your `.glsl` files.
3. A random image + shader pairing renders immediately.
4. Click anywhere on the canvas, press **space**, or hit **Shuffle** to
   get a new random pairing. **New image** / **New shader** reroll just
   one side.

Supported image extensions: `png jpg jpeg webp gif bmp`
Supported shader extensions: `glsl frag fs fsh`

## Writing your own shaders

Every shader file just needs to define one function:

```glsl
vec4 mainImage(vec2 uv, sampler2D tex, vec2 resolution, float time) {
  // uv:          0..1 texture coordinates, already "cover"-fit to the
  //              screen (like CSS background-size: cover — no stretching)
  // tex:         the background texture (the randomly chosen image)
  // resolution:  canvas size in pixels, e.g. (1920.0, 1080.0)
  // time:        seconds elapsed since the shader was loaded
  return texture2D(tex, uv);
}
```

The app wraps this in a full GLSL ES 1.00 fragment shader, handles the
vertex stage, texture binding, and cover-fit math for you — so a
shader file can just be that one function (plus any helper functions
or constants you want above it).

Six examples are included in `shaders/`:

| File | Effect |
|---|---|
| `grayscale.glsl` | Desaturate + contrast |
| `chromatic-aberration.glsl` | Animated RGB channel split |
| `pixelate.glsl` | Mosaic / grid snap |
| `wave-distort.glsl` | Slow sine-wave ripple |
| `crt-scanlines.glsl` | Moving scanlines + vignette |
| `vignette-grain.glsl` | Vignette + procedural film grain |

Drop new `.glsl` files into your shaders folder (or any folder — you
re-pick it each session) and they'll show up in the random rotation
next time you select that folder.

## Notes & limits

- Folder access is **per session** — reselect the folders after a page
  reload. (This was a deliberate trade-off for zero setup / no server;
  say the word if you'd rather have a small local server that reads
  the folders automatically on every launch.)
- If a shader fails to compile, a red toast shows the GLSL compiler
  error and the app keeps showing the last valid shader (or the raw
  image) instead of going blank.
- Non-power-of-two images are handled (clamped, no mipmaps) so any
  photo size works.
- Rendering is capped at 2x device pixel ratio to keep it smooth on
  high-DPI displays.
