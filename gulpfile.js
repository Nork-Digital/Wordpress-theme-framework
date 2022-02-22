import gulp from "gulp";

import concat from "gulp-concat";
import babel from "gulp-babel";
import uglify from "gulp-uglify";

import imagemin from "gulp-imagemin";
import clean from "gulp-clean";

import dartSass from "sass";
import gulpSass from "gulp-sass";
const sass = gulpSass(dartSass);
import autoPrefixer from "gulp-autoprefixer";

function cleanGulpImg() {
  return gulp.src("img-otimizada/*").pipe(clean());
}
gulp.task("clean-img", cleanGulpImg);

function gulpImg() {
  return gulp
    .src("img/**/*")
    .pipe(imagemin())
    .pipe(gulp.dest("img-otimizada/"));
}
gulp.task("gulp-img", gulp.series("clean-img", gulpImg));

function gulpCss() {
  return gulp
    .src("css/sass/*")
    .pipe(sass({ outputStyle: "compressed" }))
    .pipe(
      autoPrefixer({
        overrideBrowserslist: ["last 2 versions"],
        cascade: false,
      })
    )
    .pipe(gulp.dest("css/"));
}
gulp.task("gulp-css", gulpCss);

function gulpJs() {
  return gulp
    .src("js/main/*")
    .pipe(concat("script.js"))
    .pipe(
      babel({
        presets: ["@babel/env"],
      })
    )
    .pipe(uglify())
    .pipe(gulp.dest("js/"));
}
gulp.task("gulp-js", gulpJs);

gulp.task("watch", function () {
  gulp.watch("img/**/*", gulp.series(cleanGulpImg, gulpImg));
  gulp.watch("css/sass/*", gulpCss);
  gulp.watch("js/main/*", gulpJs);
});

gulp.task("default", gulp.parallel("watch", "gulp-js", "gulp-css"));
