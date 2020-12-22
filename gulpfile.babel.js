const GulpClient = require("gulp");
import yargs from 'yargs';
import sass from 'gulp-sass';
import gulp from 'gulp';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sorucemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';

const server = browserSync.create();
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
  scripts: {
      src: ['./src/assets/js/bundle.js','./src/assets/js/admin.js'],
      dest: 'dist/assets/js'
  },
  other: {
     src: ['src/assets/**/*','!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
     dest: 'dist/assets'
  }
}

function serve(cb){
   server.init({
     proxy: "http://localhost/WpRazvoj/"
   });

   cb();
}

function reload(cb){
   server.reload();
   cb();
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
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(server.stream());

    cb();
  
}

function watch(){
  gulp.watch('src/assets/scss/*.scss', styles);
  gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
  gulp.watch('**/*.php', reload);
  gulp.watch(paths.images.src, gulp.series(images, reload));
  gulp.watch(paths.other.src, gulp.series(copy,reload));
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

function scripts(){
  return gulp.src(paths.scripts.src)
  .pipe(named())
  .pipe(webpack({
    module: {
      rules:[
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['@babel/preset-env']
            }
          }
        }
      ]
    },
    output: {
      filename: '[name].js'
    },
    externals: {
       jquery: 'jQuery'
    },
    devtool: !PRODUCTION ? 'inline-source-map' : false
  }))
  .pipe(gulpif(PRODUCTION, uglify()))
  .pipe(gulp.dest(paths.scripts.dest));
}

/*function build(){
  gulp.series(clean, gulp.parallel(styles,images, copy));

}*/



exports.dev = series(clean, parallel(styles, scripts,images,copy),serve, watch);

exports.build = series(clean, parallel(styles,scripts, images,copy));


exports.scripts = scripts;
exports.styles = styles;
exports.watch = watch;
exports.images = images;
exports.copy = copy;
exports.clean = clean;


exports.default = defaultTask;

