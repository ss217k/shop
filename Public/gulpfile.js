/*
* @Author: slr
* @Date:   2016-04-01 17:13:39
* @Last Modified by:   slr
* @Last Modified time: 2016-04-01 17:41:18
*/

'use strict';

var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var watch = require('gulp-watch');
var minifycss = require('gulp-minify-css');
var combiner = require('stream-combiner2');




// 压缩js库
var jsList = [
    "js/jquery-1.10.2.js",
    "js/jquery-migrate-1.2.1.js",
    "js/bootstrap.min.js",
    "js/jquery.cookie.js",
    "js/bootbox.js",
    "js/jquery.form.js",
    "js/jquery.caretposition.js",
    "js/jquery.sew.js",
    "js/angular.js",
    "uploadifive/jquery.uploadifive.js"
];
gulp.task('zipjs', function () {
    gulp.src(jsList)
     .pipe(concat('lib.js'))
     .pipe(uglify())
     .pipe(gulp.dest('dist/js'));
    gulp.src('js/unicourse.js')
     .pipe(uglify())
     .pipe(gulp.dest('dist/js'));
});

// 压缩css库
gulp.task('zipcss', function () {
    var cssList =  [];
    gulp.src(cssList)
    .pipe(concat('style' + theme + '.css'))
    .pipe(minifycss(['*.css']))
    .pipe(gulp.dest('dist/css'));
});

gulp.task('watch', function () {
    return gulp.watch(jsList.concat('js/unicourse.js'), ['zipjs']);
});

gulp.task('default', ['watch']);