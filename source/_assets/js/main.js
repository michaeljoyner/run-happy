import Flickity from "flickity";

window.addEventListener("load", () => {
  console.log("starting");
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
console.log("starting one");
