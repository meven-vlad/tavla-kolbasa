'use strict';

const {task,watch,parallel,series,src,dest,lastRun} = require('gulp');
const path = require('path');
const include = require('gulp-include');
const gulpif = require('gulp-if');
const plumber = require('gulp-plumber');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const imagemin = require('gulp-imagemin');
const imageminJpegRecompress = require('imagemin-jpeg-recompress');
const pngquant = require('imagemin-pngquant');
const pug = require('gulp-pug');
const bem = require('pug-bem');
bem.b = 'b-';
const pugOptions = {
  pretty: true,
  plugins: [bem]
}
const htmlbeautify = require('gulp-html-beautify');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const del = require('del');
const notify = require('gulp-notify');
const zip = require('gulp-zip');
const rev = require('gulp-rev-append');
const inline_tag = ['use','b','i','s','del','span'];
const PATCH = {
  build: { //dirs build
    html: './public/',
    pagesHtml: './html/',
    js: './public/js',
    css: './public/css',
    img: './public/img',
    fonts: './public/fonts',
    icons: './public/icons'
  },
  src: { //src dir
    pages: './src/pages/**/*.pug',
    js: {
      main: './src/js/script.js',
      plugins: ['./node_modules/jquery/dist/jquery.min.js','./src/js/plugins/plugins.js']
    },
    styles: './src/styles/style.scss',
    img: ['./src/blocks/**/img/*','./src/img/*'],
    fonts: {
      src: './src/fonts/**/*',
      style: './src/styles/fonts.scss'
    },
    icons: './src/icons/icomoon/symbol-defs.svg'
  },
  watch: {
    pug: {
      blocks: ['./src/blocks/**/*.pug','./src/templates/*.pug'],
      pages: './src/pages/**/*.pug'
    },
    js: {
      plugins: './src/js/plugins/plugins.js',
      main: ['./src/js/script.js','./src/blocks/**/*.js'],
    },
    styles: ['./src/styles/**/*.scss','./src/blocks/**/*.scss'],
    fonts: {
      src: './src/fonts/**/*',
      style: './src/styles/fonts.scss'
    },
    img: ['./src/blocks/**/img/*','./src/img/*']
  }
};

global.isImgMin = true;
global.svgSprite = false;

const dev_server = {
  server: {
    baseDir: PATCH.build.html,
    open: true
  },
  notify: true
};
function startServer(cb){
  browserSync.init(dev_server);
  return cb();
}
function reload(){
  return browserSync.reload();
}
// ---------  JS  ----------------
function js(){
  let jsSrc = PATCH.src.js.main;
  if (global.svgSprite){
    jsSrc= [PATCH.src.js.main,'./src/js/svgxuse.min.js']
  }
  return src(jsSrc)
    .pipe(plumber())
    .pipe(include())
    .pipe(gulpif(global.jsMin,uglify()))
    .pipe(dest(PATCH.build.js))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
function jsPlugins(){
  return src(PATCH.src.js.plugins)
    .pipe(plumber())
    .pipe(include({includePaths: './node_modules'}))
    .pipe(uglify())
    .pipe(dest(PATCH.build.js))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
// ---------  FONTS  ----------------
function fonts(){
  return src(PATCH.src.fonts.src)
    .pipe(plumber())
    .pipe(dest(PATCH.build.fonts))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
function fontsStyle(){
  return src(PATCH.src.fonts.style)
    .pipe(sass().on('error', notify.onError(
      {
        message: "<%= error.message %>",
        title  : "Sass Error!"
      })))
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(gulpif(global.isBuild, cleanCSS({debug: true},)))
    .pipe(dest(PATCH.build.css))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
// ---------  ICONS  ---------------
function icons(cb){
  if (global.svgSprite) {
    return src(PATCH.src.icons)
      .pipe(plumber())
      .pipe(dest(PATCH.build.icons))
      .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
  }else{
    return cb();
  }
}
// ---------  STYLES  --------------
function styles(){
  return src(PATCH.src.styles)
    .pipe(sass().on('error', notify.onError(
      {
        message: "<%= error.message %>",
        title  : "Sass Error!"
      })))
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(gulpif(global.isBuild, cleanCSS({debug: true},)))
    .pipe(dest(PATCH.build.css))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
// -----------  PUG  -------------
function templates(){
  return src(PATCH.src.pages)
    .pipe(pug(pugOptions).on( 'error', notify.onError(
      {
        message: "<%= error.message %>",
        title  : "Pug Error!"
      })))
    .pipe(htmlbeautify({inline: inline_tag}))
    .pipe(dest(PATCH.build.pagesHtml))
    .pipe(dest(PATCH.build.html))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
function templatesPages(){
  return src(PATCH.src.pages,{since: lastRun(templates)})
    .pipe(pug(pugOptions).on( 'error', notify.onError(
      {
        message: "<%= error.message %>",
        title  : "Pug Error!"
      })))
    .pipe(htmlbeautify({inline: inline_tag}))
    .pipe(dest(PATCH.build.pagesHtml))
    .pipe(dest(PATCH.build.html))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
function revSrc(){
  return src(PATCH.build.html + '**/*.html')
    .pipe(rev())
    .pipe(dest(PATCH.build.html))
}
//------------ IMAGES -----------------
function img(){
  return src(PATCH.src.img,{since: lastRun(img)})
    .pipe(plumber())
    .pipe(gulpif(global.isImgMin,imagemin([
      imagemin.gifsicle({interlaced: true}),
      imageminJpegRecompress({
        progressive: true,
        max: 80,
        min: 70
      }),
      imagemin.svgo(),
      pngquant({quality: [0.7,0.8]})
    ])))
    .pipe(rename({dirname: ''}))
    .pipe(dest(PATCH.build.img))
    .pipe(gulpif(global.watch,browserSync.reload({stream: true})));
}
// ----------- WATCH ALL --------------
function watchAll(cb){
  global.watch = true;
  watch(PATCH.watch.js.main, {usePolling: true}, series(js));
  watch(PATCH.watch.js.plugins, {usePolling: true}, series(jsPlugins));
  watch(PATCH.watch.fonts.src, {usePolling: true}, series(fonts));
  watch(PATCH.watch.fonts.style, {usePolling: true}, series(fontsStyle));
  watch(PATCH.watch.styles, {usePolling: true}, series(styles));
  watch(PATCH.watch.pug.blocks, {usePolling: true}, series(templates));
  watch(PATCH.watch.pug.pages, {usePolling: true}, series(templatesPages));
  watch(PATCH.watch.img, {usePolling: true}, series(img));
  watch(PATCH.src.icons, {usePolling: true}, series(icons));
  return cb();
}
// ---------- Clean -----------------
task('clear',(cb) => {
  del([PATCH.build.html + '**','!public'], {force:true});
  return cb();
});
// ---------- DEV ---------------------
task('dev',series([
  templates,
  revSrc,
  jsPlugins,
  js,
  styles,
  fontsStyle,
  fonts,
  icons,
  img,
  watchAll,
  startServer
]));
// ---------- Build -------------------
task('build', series([
  (cb) => {
    global.isBuild = true;
    return cb();
  },
  'clear',
  styles,
  fontsStyle,
  fonts,
  icons,
  js,
  jsPlugins,
  templates,
  revSrc,
  img
]));

task('css:notmin',parallel(styles));
task('js:min',series([
  (cb) => {
    global.jsMin = true;
    return cb();
  },
  js,
  jsPlugins
]));
task('img:notmin',() => {
  return src(PATCH.src.img)
    .pipe(rename({dirname: ''}))
    .pipe(dest(PATCH.build.img));
});

function createZip(dirs,mod){
  let d=new Date(),
    day=d.getDate() +'_',
    month=d.getMonth() + 1,
    year=d.getFullYear(),
    name = path.basename(process.cwd())+'_'+mod+'_',
    id = 'i'+d.getHours()+d.getMinutes()+d.getSeconds();
  if (month <10) month = '0' + month;
  month=month+'_';
  src(dirs)
    .pipe(zip(name+day+month+year+id+'.zip'))
    .pipe(dest('./'));
}
task('zip:build', series([
  'build',
  (cb) => {
    createZip(PATCH.build.html + '**/*','public');
    return cb();
  }
]));
task('zip:src', (cb) => {
  let files =[
    './src/**/*',
    './gulpfile.js',
    './package.json',
    './README.md'
  ];
  createZip(files,'src');
  return cb();
});
