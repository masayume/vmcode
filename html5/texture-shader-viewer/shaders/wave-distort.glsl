// wave-distort.glsl
// Displaces sample coordinates along two overlapping sine waves,
// producing a slow underwater-like ripple.

vec4 mainImage(vec2 uv, sampler2D tex, vec2 resolution, float time) {
  float wobbleX = sin(uv.y * 12.0 + time * 0.8) * 0.008;
  float wobbleY = cos(uv.x * 10.0 + time * 0.6) * 0.008;
  vec2 offset = vec2(wobbleX, wobbleY);
  return texture2D(tex, uv + offset);
}
