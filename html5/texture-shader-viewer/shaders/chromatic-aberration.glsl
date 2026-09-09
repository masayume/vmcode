// chromatic-aberration.glsl
// Splits the RGB channels radially outward from the center, with a
// slow oscillation so it breathes rather than sitting static.

vec4 mainImage(vec2 uv, sampler2D tex, vec2 resolution, float time) {
  vec2 center = vec2(0.5);
  vec2 dir = uv - center;
  float amount = 0.006 + 0.004 * sin(time * 0.6);

  float r = texture2D(tex, uv + dir * amount).r;
  float g = texture2D(tex, uv).g;
  float b = texture2D(tex, uv - dir * amount).b;
  float a = texture2D(tex, uv).a;

  return vec4(r, g, b, a);
}
