const GulpClient = require("gulp");
import yargs from 'yargs';
import sass from 'gulp-sass';
import gulp from 'gulp';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';

const PRODUCTION = yargs.argv.prod;




function defaultTask(cb) {
  console.log('PRODUCTION');
  cb();
}

//Task for compiling css to scss
function styles(cb){

  return gulp.src('./src/assets/scss/bundle.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION,cleanCSS({compatibility: 'ie8'})))
    .pipe(gulp.dest('dist/assets/css'));

    cb();
  
}




exports.styles = styles;

exports.default = defaultTask

