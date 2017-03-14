/*  
|-------------------------------------------------------------------------- 
| Include Dependencies
|--------------------------------------------------------------------------
|
*/

var gulp = require('gulp');
var watch = require('gulp-watch');
var stylus = require('gulp-stylus');
var connect = require('gulp-connect-php');
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

gulp.task('browser-sync',['php-server'], function() {
    browserSync({
        proxy: '127.0.0.1:8000',
        port: 8000,
        open: 'local',
        online: true,
        notify: false
    });
});

/*  
|-------------------------------------------------------------------------- 
| PHP Server
|--------------------------------------------------------------------------
|
*/

gulp.task('php-server', function() {
  connect.server({
  	port: 8000,
  	base: './public/',
  	hostname: '127.0.0.1'
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

 
