const GulpClient = require("gulp");
import yargs from 'yargs';
import sass from 'gulp-sass';
import gulp from 'gulp';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sorucemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
const { series, parallel } = require('gulp');

const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: ['./src/assets/scss/bundle.scss','./src/assets/scss/admin.scss'],
    dest: 'dist/assets/css'
  },
  images: {
     src: './src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
     dest: 'dist/assets/images'
  },
  other: {
     src: ['src/assets/**/*','!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
     dest: 'dist/assets'
  }
}

function clean(){
    return del(['dist']);
}




function defaultTask(cb) {
  console.log('PRODUCTION');
  cb();
}

//Task for compiling css to scss
function styles(cb){

  return gulp.src(paths.styles.src)
     .pipe(gulpif(!PRODUCTION, sorucemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION,cleanCSS({compatibility: 'ie8'})))
    .pipe(gulpif(!PRODUCTION, sorucemaps.write()))
    .pipe(gulp.dest(paths.styles.dest));

    cb();
  
}

function watch(){
  gulp.watch('src/assets/scss/*.scss', styles);
  gulp.watch(paths.images.src, images);
  gulp.watch(paths.other.src, copy);
}

function images(){
  return gulp.src(paths.images.src)
  .pipe(gulpif(PRODUCTION, imagemin()))
  .pipe (gulp.dest(paths.images.dest));
}


function copy(){
  return gulp.src(paths.other.src)
  .pipe(gulp.dest(paths.other.dest));
}

/*function build(){
  gulp.series(clean, gulp.parallel(styles,images, copy));

}*/



exports.dev = series(clean, parallel(styles, images,copy), watch);

exports.build = series(clean, parallel(styles, images,copy));



exports.styles = styles;
exports.watch = watch;
exports.images = images;
exports.copy = copy;
exports.clean = clean;


exports.default = defaultTask;

