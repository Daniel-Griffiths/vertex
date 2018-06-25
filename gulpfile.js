/*  
|-------------------------------------------------------------------------- 
| Require Dependencies
|--------------------------------------------------------------------------
|
*/

const gulp = require('gulp');
const watch = require('gulp-watch');
const stylus = require('gulp-stylus');
const browserSync = require('browser-sync');
const sourcemaps = require('gulp-sourcemaps');

/*  
|-------------------------------------------------------------------------- 
| Asset Paths
|--------------------------------------------------------------------------
|
*/

const css_source = './resources/assets/css/**/*.styl';
const css_dest = './public/assets/css';
const php_source = './app/**/*.php';

/*  
|-------------------------------------------------------------------------- 
| Watch
|--------------------------------------------------------------------------
|
*/

gulp.task('watch', () => {
  gulp.watch(css_source, gulp.series(browserSync.reload));
  gulp.watch(php_source, gulp.series(browserSync.reload));
});

/*  
|-------------------------------------------------------------------------- 
| Browser Sync
|--------------------------------------------------------------------------
|
*/

gulp.task('browser-sync', () => {
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

gulp.task('css', () => {
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

gulp.task('default', gulp.series(gulp.parallel('css', 'browser-sync', 'watch')));

 
