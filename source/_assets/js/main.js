import Flickity from "flickity";
import Vue from "vue";
import PhotoGallery from "./components/PhotoGallery";

Vue.component("photo-gallery", PhotoGallery);

window.addEventListener("load", () => {
  const galleries = document.querySelectorAll(".simple-gallery");

  galleries.forEach(
    gallery =>
      new Flickity(gallery, {
        cellAlign: "left",
        contain: true,
        pageDots: true
      })
  );
});

new Vue({
  el: "#app"
});
