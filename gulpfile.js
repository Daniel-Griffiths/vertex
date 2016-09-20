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
var css_source = './resources/assets/css/app.styl';
var css_dest = './public/assets/css';

/* other */
var reload  = browserSync.reload;  
 
/*  
|-------------------------------------------------------------------------- 
| Watch
|--------------------------------------------------------------------------
|
*/

gulp.task('watch', function() {
  gulp.watch(css_source, ['compile-css']);
  gulp.watch('**/*.php', [reload]);
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
        open: true,
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

gulp.task('default', ['php-server','watch','compile-css']);

 