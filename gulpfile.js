var gulp        = require('gulp');
var gutil       = require('gulp-util');
var bower       = require('bower');
var jshint      = require('gulp-jshint');
var stylish     = require('jshint-stylish');
var shell       = require('gulp-shell');
var runSequence = require('run-sequence');
var webserver   = require('gulp-webserver');
var paths       = { src: 'src' };

// Sequenced tasks
gulp.task('default', ['build']);

// Debug in browser
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
      host: 'localhost',
      port: 8000,
      livereload: true,
      directoryListing: false
    }));
});
