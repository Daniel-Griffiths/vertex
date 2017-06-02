/*  
|-------------------------------------------------------------------------- 
| Include Dependencies
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
| Variables
|--------------------------------------------------------------------------
|
*/

/* css */
var css_source = './app/resources/assets/css/**/*.styl';
var css_dest = './public/assets/css';

/*  
|-------------------------------------------------------------------------- 
| Watch
|--------------------------------------------------------------------------
|
*/

gulp.task('watch', function() {
  gulp.watch(css_source, [browserSync.reload]);
  gulp.watch('**/*.php', [browserSync.reload]);
});

/*  
|-------------------------------------------------------------------------- 
| Browser Sync
|--------------------------------------------------------------------------
|
*/

gulp.task('browser-sync', function() {
    browserSync({
        proxy: 'vertex.dev',
        notify: false
    });
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

gulp.task('default', ['compile-css', 'browser-sync', 'watch']);

 
