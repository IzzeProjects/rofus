'use strict';

let gulp = require('gulp'),
    watch = require('gulp-watch'),
    autoprefixer = require('autoprefixer'),
    uglify = require('gulp-uglify'),
    sourcemaps = require('gulp-sourcemaps'),
    cssmin = require('gulp-clean-css'),
    del = require('del'),
    rimraf = require('rimraf'),
    browserSync = require("browser-sync").create(),
    webpackStream = require('webpack-stream'),
    postcss = require("gulp-postcss"),
    assets = require('postcss-assets'),
    twig = require('gulp-twig'),
    VueLoaderPlugin = require('vue-loader/lib/plugin'),
    reload = browserSync.reload;
let path = {
    build: {
        html: 'build/',
        js: 'build/js/',
        css: 'build/css/',
        img: 'build/img/',
        fonts: 'build/fonts/'
    },
    src: {
        html: 'src/html/*.twig',
        js: 'src/js/**/*.js',
        style: 'src/style/main.css',
        img: 'src/img/**/*.*',
        fonts: 'src/fonts/**/*.*'
    },
    watch: {
        html: 'src/html/**/*.twig',
        js: 'src/js/**/*.*',
        style: 'src/style/**/*.css',
        img: 'src/img/**/*.*',
        fonts: 'src/fonts/**/*.*'
    },
    clean: './build'
};

gulp.task('clean', function (cb) {
    return rimraf('build/', cb);
});

gulp.task('html:build', function (cb) {
    del(['build/**/*.html']);

    return gulp.src(path.src.html)
        .pipe(twig())
        .pipe(gulp.dest(path.build.html))
});

gulp.task('js:dev', function () {
    return gulp.src(path.src.js)
        .pipe(webpackStream({
            entry: ["regenerator-runtime/runtime", "./src/js/app.js"],
            mode: 'development',
            output: {
                filename: 'app.js',
            },
            resolve: {
                alias: {
                    'vue$': 'vue/dist/vue.esm.js'
                },
                extensions: ['*', '.js', '.vue', '.json']
            },
            module: {
                rules: [
                    {
                        test: /\.(vue)$/,
                        loader: 'vue-loader'
                    },
                    {
                        test: /\.(js)$/,
                        exclude: /(node_modules)/,
                        loader: 'babel-loader',
                    },
                    {
                        test: /\.(postcss|css)$/,
                        use: [
                            'vue-style-loader',
                            {
                                loader: 'css-loader',
                                options: {importLoaders: 1}
                            },
                            'postcss-loader'
                        ]
                    }

                ]
            },
            plugins: [
                new VueLoaderPlugin()
            ]
        }))
        .pipe(sourcemaps.init())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.js))
});

gulp.task('js:build', function () {
    return gulp.src(path.src.js)
        .pipe(webpackStream({
            entry: ["regenerator-runtime/runtime", "./src/js/app.js"],
            mode: 'production',
            output: {
                filename: 'app.js',
            },
            resolve: {
                alias: {
                    'vue$': 'vue/dist/vue.esm.js'
                },
                extensions: ['*', '.js', '.vue', '.json']
            },
            module: {
                rules: [
                    {
                        test: /\.(vue)$/,
                        loader: 'vue-loader'
                    },
                    {
                        test: /\.(js)$/,
                        exclude: /(node_modules)/,
                        loader: 'babel-loader',
                    },
                    {
                        test: /\.(postcss|css)$/,
                        use: [
                            'vue-style-loader',
                            {
                                loader: 'css-loader',
                                options: {importLoaders: 1}
                            },
                            'postcss-loader'
                        ]
                    }

                ]
            },
            plugins: [
                new VueLoaderPlugin()
            ]
        }))
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.js))
});

gulp.task('style:dev', function () {
    return gulp.src(path.src.style)
        .pipe(sourcemaps.init())
        .pipe(cssmin())
        .pipe(sourcemaps.write())
        .pipe(postcss([assets({
            basePath: "build/",
            loadPaths: ["**"]
        }), autoprefixer()]))
        .pipe(gulp.dest(path.build.css))
        .pipe(reload({stream: true}));
});

gulp.task('style:build', function () {
    return gulp.src(path.src.style)
        .pipe(sourcemaps.init())
        .pipe(cssmin())
        .pipe(sourcemaps.write())
        .pipe(postcss([assets({
            basePath: "build/",
            loadPaths: ["**"],
            relative: true
        }), autoprefixer()]))
        .pipe(gulp.dest(path.build.css))
        .pipe(reload({stream: true}));
});

gulp.task('image:build', function () {
    del(['build/img/**/*']);
    return gulp.src(path.src.img)
        .pipe(gulp.dest(path.build.img))
        .pipe(reload({stream: true}));
});

gulp.task('fonts:build', function () {
    return gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts))
        .pipe(reload({stream: true}));
});

gulp.task('dev', gulp.series('clean', 'html:build', 'js:dev', 'image:build',  'style:dev', 'fonts:build'));

gulp.task('build', gulp.series('clean', 'html:build', 'js:build','image:build',  'style:build', 'fonts:build'));

gulp.task('reload', function () {
    browserSync.reload();
});

gulp.task('watch', function () {
    watch(path.watch.html, gulp.series('html:build')).on('change', browserSync.reload);
    watch(path.watch.style, gulp.series('style:dev'));
    watch(path.src.fonts, gulp.series('fonts:build'));
    watch(path.watch.js, gulp.series('js:dev'));
    watch(path.src.img, gulp.series('image:build', 'style:dev')).on('change', browserSync.reload);
});

gulp.task('server', function () {
    browserSync.init({
        server: './build',
        port: 8888
    })
});

gulp.task('dev', gulp.series('dev', gulp.parallel('watch', 'server')));
gulp.task('build', gulp.series('build'));

