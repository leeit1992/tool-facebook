var gulp        = require('gulp');
var browserSync = require('browser-sync');
var minify      = require('gulp-minify');
var sass        = require('gulp-sass');


gulp.task('js-complie', function() {
  gulp.src('src/frontend/js/*.js')
    .pipe(minify({
        ext:{
            src:'-debug.js',
            min:'.min.js'
        },
        exclude: ['tasks'],
        ignoreFiles: ['.combo.js', '-min.js']
    }))
    .pipe(gulp.dest('public/frontend/js/'));

    gulp.src('src/backend/js/**/*.js')
    .pipe(minify({
        ext:{
            src:'-debug.js',
            min:'.min.js'
        },
        exclude: ['tasks'],
        ignoreFiles: ['.combo.js', '-min.js']
    }))
    .pipe(gulp.dest('public/backend/js/'));
});

gulp.task('js-watch', ['js-complie'], browserSync.reload);

gulp.task('scss-complie', function() {
    gulp.src('src/frontend/sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('public/frontend/css/'));

    gulp.src('src/backend/sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('public/backend/css/'));
});
gulp.task('scss-watch', ['scss-complie'], browserSync.reload);



gulp.task('watch',[], function () {
    browserSync.init({
        proxy: 'http://localhost/project10',
        files: ['{app,resources}/**/*.php', '*.php'],
      });
    
    gulp.watch('src/frontend/sass/**/*.scss', ['scss-watch']);
    gulp.watch('src/backend/sass/**/*.scss', ['scss-watch']);
    gulp.watch(['*.php'], browserSync.reload);
    gulp.watch('src/frontend/js/*.js', ['js-watch']);
    gulp.watch('src/backend/js/*.js', ['js-watch']);
});
