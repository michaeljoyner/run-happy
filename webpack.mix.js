let mix = require("laravel-mix");
let build = require("./tasks/build.js");
let tailwindcss = require("tailwindcss");
require("laravel-mix-purgecss");

mix.setPublicPath("source/assets/build");
mix.webpackConfig({
  plugins: [
    build.jigsaw,
    build.browserSync(),
    build.watch([
      "source/**/*.md",
      "source/**/*.php",
      "source/**/*.scss",
      "!source/**/_tmp/*"
    ])
  ]
});

mix
  .js("source/_assets/js/main.js", "js")
  .less("source/_assets/less/main.less", "css")
  .options({
    postCss: [tailwindcss("./tailwind.config.js")]
  })
  .purgeCss({
    folders: ["source"],
    extensions: ["html", "js", "php", "vue", "md"]
  })
  .version();
