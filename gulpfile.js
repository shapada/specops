"use strict";

// Load plugins
const autoprefixer = require("autoprefixer");
const browsersync = require("browser-sync").create();
const cp = require("child_process");
const cssnano = require("cssnano");
const del = require("del");
const gulp = require("gulp");
const imagemin = require("gulp-imagemin");
const newer = require("gulp-newer");
const plumber = require("gulp-plumber");
const postcss = require("gulp-postcss");
const rename = require("gulp-rename");
const sass = require("gulp-sass");

// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: "specops.test"
    });
    done();
}

// BrowserSync Reload
function browserSyncReload(done) {
    browsersync.reload();
    done();
}

// Clean assets
function clean() {
    return del(["./styles/css/main-style.css"]);
}

// Optimize Images
function images() {
    return gulp
        .src("./images")
        .pipe(newer("./images"))
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({ progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({
                    plugins: [{
                        removeViewBox: false,
                        collapseGroups: true
                    }]
                })
            ])
        )
        .pipe(gulp.dest("./images"));
}

// CSS task
function css() {
    return gulp
        .src("./styles/scss/**/*.scss")
        .pipe(plumber())
        .pipe(sass({ outputStyle: "expanded" }))
        .pipe(gulp.dest("./styles/css"))
        .pipe(rename({ suffix: ".min", basename: "main-style", extname: ".css" }))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(gulp.dest("./styles/css/"))
        .pipe(rename({ basename: "main-style", extname: ".css" }))
        .pipe(browsersync.stream());
}

// Transpile, concatenate and minify scripts
function scripts() {
    return (
        gulp
        .src(["./scripts/**/*"])
        .pipe(plumber())
        .pipe(gulp.dest("./_site/assets/js/"))
        .pipe(browsersync.stream())
    );
}

// Watch files
function watchFiles() {
    gulp.watch("./styles/scss/**/*", css);
    gulp.watch("./scripts/**/*", gulp.series(scripts));
    gulp.watch(
        [
            "./*",
            "./blocks/**/*",
            "./templates/**/*",
            "./functions/*",
            "./pages/*",
        ],
        gulp.series(browserSyncReload)
    );
}

// define complex tasks
const js = gulp.series(scripts);
const build = gulp.series(clean, gulp.parallel(css, images, js));
const watch = gulp.parallel(watchFiles, browserSync);

// export tasks
exports.images = images;
exports.css = css;
exports.js = js;
exports.clean = clean;
exports.build = build;
exports.watch = watch;
exports.default = build;