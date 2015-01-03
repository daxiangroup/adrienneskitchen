var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    del = require('del');

gulp.task('styles-sass', function() {
    return gulp.src('src/css/akit.scss')
        .pipe(sass({ style: 'compressed', sourcemap: false }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('dist/css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifycss())
        .pipe(gulp.dest('dist/css'));
});

gulp.task('styles-minify', function() {
    return gulp.src('src/css/normalize.css')
        .pipe(gulp.dest('dist/css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifycss())
        .pipe(gulp.dest('dist/css'));
});

gulp.task('styles', ['styles-sass', 'styles-minify'], function() {
    return gulp.src([
            'dist/css/akit.min.css',
            'dist/css/normalize.min.css'
        ])
        .pipe(concat('akit.min.css'))
        .pipe(gulp.dest('css'));
});

gulp.task('materialize', function() {
    return gulp.src('src/materialize-src/sass/materialize.scss')
        .pipe(sass({ style: 'compressed', sourcemap: false }))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        // .pipe(gulp.dest('dist/css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifycss())
        .pipe(gulp.dest('css'));
})

gulp.task('watch', function() {
    gulp.watch('src/css/*.scss', ['styles']);
});
