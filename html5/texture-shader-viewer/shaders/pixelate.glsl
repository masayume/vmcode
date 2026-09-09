// pixelate.glsl
// Snaps UVs onto a coarse grid to mosaic the image. Grid size is
// derived from the canvas resolution so it stays consistent across
// window sizes.

vec4 mainImage(vec2 uv, sampler2D tex, vec2 resolution, float time) {
  float cells = 90.0;
  float aspect = resolution.x / resolution.y;
  vec2 grid = vec2(cells, cells / aspect);
  vec2 snapped = floor(uv * grid) / grid;
  return texture2D(tex, snapped);
}
