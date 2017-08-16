var gulp = require('gulp'),
    less = require('gulp-less'),
    path = require('path'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    browserSync = require('browser-sync'),
    reload = browserSync.reload,
    sourcemaps = require('gulp-sourcemaps');

function swallowError (error) {
  console.log(error.toString());
  this.emit('end');
}

gulp.task('browser-sync', function () {
   var files = [
      'themes/botwiki/css/*.css',
      'themes/botwiki/js/*.js'
   ];

   browserSync.init(files, {
      proxy: "localhost:5000"
   });
});


gulp.task('styles', function() {
  return gulp.src('themes/botwiki/src/styles/main.*')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .on('error', swallowError)
    .pipe(autoprefixer('last 3 version', 'android >= 3', { cascade: true }))
    .on('error', swallowError)
    .pipe(gulp.dest('themes/botwiki/css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .on('error', swallowError)
    .pipe(gulp.dest('themes/botwiki/css'))
    .pipe(notify({ message: 'Styles task complete' }))
    .pipe(reload({stream:true}));
});

gulp.task('scripts', function() {
  return gulp.src('themes/botwiki/src/scripts/*.js')
    .on('error', swallowError)
    .pipe(jshint('tests/.jshintrc'))
    .on('error', swallowError)
    .pipe(jshint.reporter('default'))
    .on('error', swallowError)
    .pipe(gulp.dest('themes/botwiki/js'))
    .on('error', swallowError)
    .pipe(rename({suffix: '.min'}))
/*
    TODO: Find a good way to only load source map in development. See https://knpuniversity.com/screencast/gulp/sourcemaps-only-dev
    Commenting out for now.
*/
//    .pipe(sourcemaps.init())
    .pipe(uglify())
    .on('error', swallowError)
//    .pipe(sourcemaps.write())
    .pipe(gulp.dest('themes/botwiki/js'))
    .on('error', swallowError)
    .pipe(notify({ message: 'Scripts task complete' }));
});

gulp.task('clean', function() {
  return gulp.src(['themes/botwiki/css', 'themes/botwiki/js'], {read: false})
    .pipe(clean());
});

gulp.task('watch', function() {
  gulp.watch('themes/botwiki/src/styles/*.less', ['styles']);
  gulp.watch('themes/botwiki/src/scripts/*.js', ['scripts']);
});

gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'scripts', 'browser-sync', 'watch');
});