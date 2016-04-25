var gulp        = require('gulp'),
    gutil       = require('gulp-util'),
    bower       = require('bower'),
    concat      = require('gulp-concat'),
    rename      = require('gulp-rename'),
    jshint      = require('gulp-jshint'),
    stylish     = require('jshint-stylish'),
    shell       = require('gulp-shell'),
    clean       = require('gulp-clean'),
    ngAnnotate  = require('gulp-ng-annotate'),
    usemin      = require('gulp-usemin'),
    uglify      = require('gulp-uglify'),
    minifyCss   = require('gulp-minify-css'),
    runSequence = require('run-sequence'),
    webserver   = require('gulp-webserver'),
    fs          = require('fs'),
    paths       = { src: 'src' };

/* sequenced tasks */
gulp.task('default', ['build']);

// debug in browser
gulp.task('build', function(cb) {
  runSequence('install', 'lint', 'serve', cb);
});


gulp.task('install', function() {
  return bower.commands.install()
    .on('log', function(data) {
      gutil.log('bower', gutil.colors.cyan(data.id), data.message);
    });
});

gulp.task('test', shell.task('node_modules/.bin/karma start --single-run'));

gulp.task('lint', function() {
  return gulp.src([
    paths.src + '/**/*.js',
    '!' + paths.src + '/**/**.spec.js',
    '!' + paths.src + '/lib/**/*.js'
    ])
      .pipe(jshint('.jshintrc'))
      .pipe(jshint.reporter(stylish))
      .pipe(jshint.reporter('fail'));
});

gulp.task('serve', function() {
  return gulp.src(paths.src)
    .pipe(webserver({
      host: '192.168.0.102',
      port: 8000,
      livereload: true,
      directoryListing: false
    }));
});
