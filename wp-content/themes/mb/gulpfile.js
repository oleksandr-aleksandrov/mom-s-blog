var gulp = require('gulp'), 
sass = require('gulp-sass');
cssnano = require('gulp-cssnano'),  
rename = require('gulp-rename'); 

gulp.task('sass', function() {
	return gulp.src(['app/sass/**/*.sass', 'app/sass/**/*.scss']) 
	.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
	.pipe(gulp.dest('app/css'))

});

gulp.task('css-libs', ['sass'], function() {
	return gulp.src('app/css/main.css')
	.pipe(cssnano()) 
	.pipe(rename({suffix: '.min'})) 
	.pipe(gulp.dest('app/css')); 
});

gulp.task('watch', ['css-libs'], function() {
	gulp.watch(['app/sass/**/*.sass', 'app/sass/**/*.scss'], ['sass']); 
});

gulp.task('default', ['watch']);