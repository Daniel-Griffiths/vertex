/*  
|-------------------------------------------------------------------------- 
| Require Dependencies
|--------------------------------------------------------------------------
|
*/

var gulp = require('gulp');
var watch = require('gulp-watch');
var stylus = require('gulp-stylus');
var browserSync = require('browser-sync');
var sourcemaps = require('gulp-sourcemaps');

/*  
|-------------------------------------------------------------------------- 
| Asset Paths
|--------------------------------------------------------------------------
|
*/

var css_source = './resources/assets/css/**/*.styl';
var css_dest = './public/assets/css';
var php_source = './app/**/*.php';

/*  
|-------------------------------------------------------------------------- 
| Watch
|--------------------------------------------------------------------------
|
*/

gulp.task('watch', function() {
  gulp.watch(css_source, [browserSync.reload]);
  gulp.watch(php_source, [browserSync.reload]);
});

/*  
|-------------------------------------------------------------------------- 
| Browser Sync
|--------------------------------------------------------------------------
|
*/

gulp.task('browser-sync', function() {
    browserSync({
        notify: false
    });
});

/*  
|-------------------------------------------------------------------------- 
| Compile Stylus
|--------------------------------------------------------------------------
|
*/

gulp.task('css', function () {
  return gulp.src(css_source)
  	.pipe(sourcemaps.init())
    .pipe(stylus({
      'compress': true,
      'include css': true
    }))
    .pipe(sourcemaps.write('.')) 
    .pipe(gulp.dest(css_dest));
});
 
/*  
|-------------------------------------------------------------------------- 
| Register Default Task
|--------------------------------------------------------------------------
|
*/

gulp.task('default', ['css', 'browser-sync', 'watch']);

 
