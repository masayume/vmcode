// grayscale.glsl
// Desaturates the image using perceptual luminance weights and
// pushes the midtones for a bit of contrast.

vec4 mainImage(vec2 uv, sampler2D tex, vec2 resolution, float time) {
  vec4 color = texture2D(tex, uv);
  float luma = dot(color.rgb, vec3(0.299, 0.587, 0.114));
  luma = smoothstep(0.0, 1.0, luma);
  return vec4(vec3(luma), color.a);
}
