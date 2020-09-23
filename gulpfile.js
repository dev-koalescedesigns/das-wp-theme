const gulp          = require('gulp');
const imagemin      = require('gulp-imagemin');
const concat        = require('gulp-concat');
const terser        = require('gulp-terser');
const sourcemaps    = require('gulp-sourcemaps');
const gulpChange    = require('gulp-change');
const uglify        = require('gulp-uglify');
const autoprefixer  = require('gulp-autoprefixer');
const sass          = require('gulp-sass');
const cleanCss      = require('gulp-clean-css');
const gulpif        = require('gulp-if');
const postCss       = require('gulp-postcss');
const lineec        = require('gulp-line-ending-corrector');
const yargs         = require('yargs');
const cache         = require('gulp-cache');
const browserSync   = require('browser-sync').create();
const reload        = browserSync.reload;
const { src, series, parallel, dest, watch } = require('gulp');
const PRODUCTION = yargs.argv.prod;

const jsPath        = 'src/js/**/*.js';
const scssPath      = 'src/sass/**/*.scss';
const cssPath       = [
                        'dist/css/**/*.css',
                        'dist/style.css'
                      ];

//.htm files
function htmTask() {
   return src('src/*.htm').pipe(gulp.dest('dist'));
 }

//.php files
function phpTask() {
  return src('src/*.php').pipe(gulp.dest('dist'));
}

//.jpg, .gif  
function imgTask() {
  return src('src/img/*.+(png|jpg|gif|svg)')
    //.pipe(imagemin())
    .pipe(cache(imagemin({
      interlaced: true
    })))
    .pipe(gulp.dest('dist/img'));
}

//.js files
function jsTask() {
  return src(jsPath)
    .pipe(sourcemaps.init())
    .pipe(concat('all.js'))
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(dest('dist/js'));
}

//.scss files
function scssTask() {
    return gulp.src([scssPath])
      .pipe(sourcemaps.init())
      //.pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
      .pipe(concat('style.css'))
      .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
      .pipe(sourcemaps.write())
      .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
      .pipe(autoprefixer('last 2 versions'))
      .pipe(lineec())
      //.pipe(gulp.dest('dist')) // CSS file will compile and dist
      .pipe(gulp.dest('src')) // CSS file will compile and source
      .pipe(browserSync.stream());
}

function concatCSS() {
  return gulp.src(cssPath)
  .pipe(sourcemaps.init({loadMaps: true, largeFile: true}))
  .pipe(concat('style.min.css'))
  .pipe(cleanCss())
  .pipe(sourcemaps.write('src/maps/'))
  .pipe(lineec())
  .pipe(gulp.dest('src/css'))
}

function watchTask() {
  browserSync.init({
    open: 'external',
    proxy: 'http://localhost:8888/wp',
    port: 8080,
  });
  gulp.watch(scssPath, scssTask);
  gulp.watch('phpTask, htmTask, jsTask').on('change', browserSync.reload);
}

exports.scssTask  = scssTask;
exports.jsTask    = jsTask;
exports.imgTask   = imgTask;
exports.htmTask   = htmTask;
exports.phpTask   = phpTask;
exports.watchTask = watchTask;
exports.default   = series(parallel(phpTask, htmTask, imgTask, jsTask), watchTask);