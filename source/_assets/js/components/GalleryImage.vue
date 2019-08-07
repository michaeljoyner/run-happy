<template>
  <img
    @click="$emit('selected', {version, public_id})"
    :srcset="sourceset"
    :src="`${base}c_scale,w_800/v${version}/public_id`"
  />
</template>

<script>
function makeSourceSet(sizes, version, public_id) {
  return sizes
    .map(
      size =>
        `https://res.cloudinary.com/dy6grlu8z/image/upload/c_scale,w_${size}/v${version}/${public_id} ${size}w`
    )
    .join(",");
}
export default {
  props: ["space", "base", "version", "public_id"],

  data() {
    return {
      sizes: [350, 500, 800, 1200]
    };
  },

  computed: {
    sourceset() {
      return makeSourceSet(this.sizes, this.version, this.public_id);
    }
  }
};
</script>

