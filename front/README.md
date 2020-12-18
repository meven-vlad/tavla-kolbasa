Quick guide

1. gulp-cli should be installed globally:
  - "yarn global add gulp-cli" or "npm install -g gulp-cli"
2. Install dependencies:
  - "yarn" or "npm install"
3. To run tasks:
   - "gulp build" - assembly of minified resources css,images
   - "gulp dev" - start the development with a live-reload. css, js are not minified have a map.
   - "gulp css:notmin" - get not minified css
   - "gulp img:notmin" - get not minified img
   - "gulp js:min" - get minified js
   - "gulp zip:build" - create archive of ready project "public"
   - "gulp zip:src" - create resource archive
4. cb.js - create block
   - "node cb [name block] [extends extends ..]" - creation of a new block and files with extensions, inclusion in "style.css" and "blocks.pug" if pug extension was specified, the base extension is ".scss"
   - "node cb [name block] rm" - remove block, inclusion
