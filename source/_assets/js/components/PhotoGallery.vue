<template>
  <div>
    <div class="justify-between">
      <figure v-for="image in images" :key="image.public_id" class="mb-12">
        <img
          class="block mb-3"
          :srcset="getSrcSet(image.version, image.public_id)"
          sizes="(min-width: 800px) 800px, 100vw"
          @click="setSelectedImage(image)"
        />
        <figcaption class="px-3 text-sm">{{ image.caption }}</figcaption>
      </figure>
    </div>
    <div
      v-if="show_selected"
      class="fixed bg-black z-50 inset-0 flex justify-center items-center lg:p-8"
    >
      <div
        class="absolute top-0 right-0 text-white text-2xl pr-4 pt-4"
        @click="show_selected = false"
      >&times;</div>
      <img :srcset="selected_source" alt class="max-h-full max-w-6xl" />
      <p
        class="absolute bottom-0 py-2 px-4 text-white w-full bg-dark-op text-center"
      >{{ selected_image.caption }}</p>
    </div>
  </div>
</template>

<script>
function makeSourceSet(sizes, version, public_id) {
  return sizes
    .map(size => {
      const url = encodeURI(
        `https://res.cloudinary.com/dy6grlu8z/image/upload/c_scale,w_${size}/v${version}/${public_id}`
      );
      return `${url} ${size}w`;
    })
    .join(",");
}

import GalleryImage from "./GalleryImage";

export default {
  components: {
    GalleryImage
  },

  data() {
    return {
      selected_image: null,
      show_selected: false,
      sizes: [350, 500, 800, 1200]
    };
  },

  props: ["images"],

  mounted() {
    document.body.addEventListener("keyup", ({ key }) => {
      if (key === "Escape") {
        this.show_selected = false;
      }
    });
  },

  computed: {
    sorted_images() {
      return this.images.sort((a, b) => a.position - b.position);
    },

    selected_source() {
      if (!this.selected_image) {
        return "";
      }
      return makeSourceSet(
        [350, 500, 800, 1200],
        this.selected_image.version,
        this.selected_image.public_id
      );
    }
  },

  methods: {
    getSrcSet(version, public_id) {
      return makeSourceSet(this.sizes, version, public_id);
    },

    setSelectedImage(image) {
      this.selected_image = image;
      this.show_selected = true;
    }
  }
};
</script>

