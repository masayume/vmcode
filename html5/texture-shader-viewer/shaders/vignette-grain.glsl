// vignette-grain.glsl
// Darkens the edges and adds animated procedural grain using a cheap
// hash-based noise function (no textures needed).

float hash(vec2 p, float seed) {
  return fract(sin(dot(p, vec2(12.9898, 78.233)) + seed) * 43758.5453);
}

vec4 mainImage(vec2 uv, sampler2D tex, vec2 resolution, float time) {
  vec4 color = texture2D(tex, uv);

  vec2 fromCenter = uv - 0.5;
  float vignette = smoothstep(0.9, 0.25, dot(fromCenter, fromCenter));
  color.rgb *= mix(0.55, 1.0, vignette);

  float grain = hash(uv * resolution.xy, fract(time)) - 0.5;
  color.rgb += grain * 0.06;

  return color;
}
