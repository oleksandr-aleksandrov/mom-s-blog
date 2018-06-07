var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    autoprefixer = require('gulp-autoprefixer');


gulp.task('sass', function () {
    return gulp.src(['app/sass/**/*.sass', 'app/sass/**/*.scss'])
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(autoprefixer(['last 12 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
        .pipe(gulp.dest('app/css'));

});

gulp.task('css-libs', ['sass'], function () {
    return gulp.src('app/css/main.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('app/css'));
});
gulp.task('watch', ['css-libs'], function () {
    gulp.watch(['app/sass/**/*.sass', 'app/sass/**/*.scss'], ['sass']);
});

gulp.task('default', ['watch']);