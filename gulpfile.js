/*
  Gulp Task Runner
  If you don't know how to use Gulp.js, you should learn!
  https://github.com/gulpjs/gulp/blob/master/docs/README.md
*/

//Paths
var THEMENAME = "vpf",
    THEMEPATH = "wp-content/themes/" + THEMENAME + "/assets/";

// Load plugins
var gulp = require('gulp'),
  plugins = require('gulp-load-plugins')({ camelize: true }),
  lr = require('tiny-lr'),
  server = lr();

// Styles
gulp.task('appstyles', function() {
  return gulp.src(THEMEPATH + 'styles/application.scss')
  .pipe(plugins.rubySass({ 
    style: 'expanded',
    trace: false,
    debugInfo: false
  }))
  .pipe(plugins.rename({ suffix: '.min' }))
  .pipe(plugins.autoprefixer({
    browsers: ['last 2 versions'],
    cascade: true
  }))
  .pipe(gulp.dest(THEMEPATH + 'build/styles'))
  .pipe(plugins.minifyCss({ keepSpecialComments: 1 }))
  .pipe(plugins.livereload(server))
});

// Vendor Styles
gulp.task('vendorstyles', function() {
  return gulp.src(THEMEPATH + 'styles/vendor.scss')
  .pipe(plugins.rubySass({ style: 'compressed'}))
  .pipe(plugins.rename({ suffix: '.min' }))
  .pipe(plugins.autoprefixer({
    browsers: ['last 2 versions'],
    cascade: true
  }))
  .pipe(gulp.dest(THEMEPATH + 'build/styles'))
  .pipe(plugins.minifyCss({ keepSpecialComments: 1 }))
  .pipe(plugins.livereload(server))
});

// Vendor Plugin Scripts
gulp.task('plugins', function() {
  //Add Plugins in order as needed
  return gulp.src([
    THEMEPATH + 'js/source/plugins.js',
    THEMEPATH + 'js/vendor/cycle.js',
    ])
  .pipe(plugins.concat('plugins.js'))
  .pipe(plugins.rename({ suffix: '.min' }))
  .pipe(plugins.uglify())
  .pipe(plugins.livereload(server))
  .pipe(gulp.dest(THEMEPATH + 'build/js'))
});

// Site Scripts
gulp.task('scripts', function() {
  return gulp.src([
    THEMEPATH + 'js/source/custom.js'
    ])
  .pipe(plugins.jshint('.jshintrc'))
  .pipe(plugins.jshint.reporter('default'))
  .pipe(plugins.concat('main.js'))
  .pipe(plugins.rename({ suffix: '.min' }))
  .pipe(plugins.uglify())
  .pipe(gulp.dest(THEMEPATH + 'build/js'))
});

// Images
gulp.task('images', function() {
  return gulp.src(THEMEPATH + 'images/**/*')
  .pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })))
  .pipe(plugins.livereload(server))
  .pipe(gulp.dest(THEMEPATH + 'images'))
});

// Watch
gulp.task('watch', function() {

  // Listen on port 35729
  server.listen(35729, function (err) {
  if (err) {
    return console.log(err)
  };

  // Watch .scss files
  gulp.watch(THEMEPATH + 'styles/**/*.scss', ['appstyles']);

  // Watch .scss files
  gulp.watch(THEMEPATH + 'styles/**/*.scss', ['vendorstyles']);

  // Watch .js files
  gulp.watch(THEMEPATH + 'js/**/*.js', ['plugins', 'scripts']);

  // Watch image files
  gulp.watch(THEMEPATH + 'images/**/*', ['images']);

  });

});

// Default task
gulp.task('default', ['appstyles', 'plugins', 'scripts', 'images', 'watch']);