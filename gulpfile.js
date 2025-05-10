const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function () {
	return gulp.src('./scss/style.scss').pipe(sass().on('error', sass.logError)).pipe(autoprefixer()).pipe(cleanCSS()).pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
	gulp.watch('./scss/**/*.scss', gulp.series('sass'));
});
