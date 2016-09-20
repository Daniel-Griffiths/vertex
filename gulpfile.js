/*  
|-------------------------------------------------------------------------- 
| Include Dependencies
|--------------------------------------------------------------------------
|
*/

var gulp = require('gulp');
var watch = require('gulp-watch');
var stylus = require('gulp-stylus');
var sourcemaps = require('gulp-sourcemaps');

/*  
|-------------------------------------------------------------------------- 
| Variables
|--------------------------------------------------------------------------
|
*/

/* css */
var css_source = './resources/assets/css/app.styl';
var css_dest = './public/assets/css';
 
/*  
|-------------------------------------------------------------------------- 
| Watch
|--------------------------------------------------------------------------
|
*/

gulp.task('watch', function() {
  gulp.watch(css_source, ['compile-css']);
});

/*  
|-------------------------------------------------------------------------- 
| Compile Stylus
|--------------------------------------------------------------------------
|
*/

gulp.task('compile-css', function () {
  return gulp.src(css_source)
  	.pipe(sourcemaps.init())
    .pipe(stylus({
      compress: true
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(css_dest));
});
 
/*  
|-------------------------------------------------------------------------- 
| Register Default Task
|--------------------------------------------------------------------------
|
*/

gulp.task('default', ['compile-css']);

 