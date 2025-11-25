"use strict";
const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const browsersync = require('browser-sync').create();
const npmDist = require('gulp-npm-dist');

// Sass Task
function scssTask(){
  return src('src/scss/style.scss', { sourcemaps: true })
    .pipe(sass())
    //.pipe(postcss([cssnano()]))
    .pipe(dest('dist/css', { sourcemaps: '.' }));
}

// Copy Files Tasks(Files from node_module to Vendor Using package.json file) 
function copyDist() {
  const packageJson = require('./package.json');
  const dependencies = Object.keys(packageJson.dependencies);	
  return src(npmDist({
      onlyDev: false, // Set to 'true' if you want to include devDependencies as well
      exclude: dependencies.map(dep => `!${dep}`), // Exclude all dependencies except the specified ones
    }), {base:'./node_modules'})
  .pipe(dest('public/'));
}

// Browsersync Tasks
function browsersyncServe(cb){
  browsersync.init({
    server: {
      baseDir: '.'
    }
  });
  cb();
}

function browsersyncReload(cb){
  browsersync.reload();
  cb();
}

// Watch Task
function watchTask(){
  watch('*.html', browsersyncReload);
  watch(['dist/**/*.js', 'vendors/**/*.js'], browsersyncReload);
  watch(['src/scss/*.scss'], series(scssTask,  browsersyncReload));
}

// Create Vendor task
exports.vendors = copyDist;

// Default Gulp task
exports.default = series(
  scssTask,
  browsersyncServe,
  watchTask,
);