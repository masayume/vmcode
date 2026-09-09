// crt-scanlines.glsl
// Overlays moving horizontal scanlines and a faint vignette darkening
// toward the edges, evoking an old CRT monitor.

vec4 mainImage(vec2 uv, sampler2D tex, vec2 resolution, float time) {
  vec4 color = texture2D(tex, uv);

  float scanline = sin((uv.y * resolution.y * 0.9) - time * 40.0) * 0.5 + 0.5;
  color.rgb *= mix(0.82, 1.0, scanline);

  vec2 fromCenter = uv - 0.5;
  float vignette = 1.0 - dot(fromCenter, fromCenter) * 0.9;
  color.rgb *= vignette;

  return color;
}
