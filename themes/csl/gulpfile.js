'use strict';
// generated on 2015-06-01 using generator-gulp-webapp 0.1.0

var gulp = require('gulp');

// load plugins
var $ = require('gulp-load-plugins')();
var svg2png = require('gulp-svg2png');
var pngquant = require('imagemin-pngquant');
var gulpif = require('gulp-if');
//var fileinclude = require('gulp-file-include');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cssBase64 = require('gulp-css-base64');
var inlineBase64 = require('gulp-css-base64');

// watching or not
var watching = false;

// handle errors without breaking watch
function handleError(err) {
  console.log(err.toString());
    if (watching) {
        this.emit('end');
    }
}

// build scss into stylesheet, prefix, shrink & output to .tmp
gulp.task('styles', function () {
    return gulp.src('app/scss/*.scss')
        .pipe($.rubySass({
            style: 'expanded',
            require: 'susy',
            precision: 10
        }))
        .on("error", handleError)
        .pipe($.autoprefixer('last 2 version', '> 5%', 'ie 8', 'ie 9'))
        .pipe(gulp.dest('.tmp/styles'))
        .pipe(gulp.dest('styles'))
        .pipe($.size());
});

// minify & move modernizr by itself (needs to load first)
gulp.task('modernizr', function () {
    return gulp.src('bower_components/modernizr/modernizr.js')
        .pipe(gulp.dest('.tmp/scripts/vendor'))
        .pipe(gulp.dest('scripts/vendor'))
        .pipe($.size());
});

// minify & move modernizr by itself (needs to load first)
gulp.task('sourcemaps', function () {
    return gulp.src([
            'bower_components/svg-injector/dist/svg-injector.map.js'
        ])
        .pipe(gulp.dest('.tmp/scripts'))
        .pipe(gulp.dest('scripts'))
        .pipe($.size());
});

// vendor scripts - concat, minify
gulp.task('vendor', ['modernizr', 'sourcemaps'], function () {
    return gulp.src([
            'bower_components/jquery/dist/jquery.js',
            'bower_components/enquire/dist/enquire.js',
            'bower_components/velocity/velocity.min.js',
            'bower_components/velocity/velocity.ui.min.js',
            'bower_components/ajaxchimp/jquery.ajaxchimp.min.js',
            'bower_components/svg-injector/dist/svg-injector.min.js',
            'bower_components/scrollr/src/skrollr.js',
            'bower_components/svgeezy/svgeezy.js',
            'bower_components/matchHeight/jquery.matchHeight.js',
            'app/scripts/vendor/*.js'
        ])
        .pipe(concat('vendor.js'))
        .pipe(uglify())
        .pipe(gulp.dest('.tmp/scripts'))
        .pipe(gulp.dest('scripts'))
        .pipe($.size());
});

// legacy vendor scripts - concat, minify
gulp.task('legacy', function () {
    return gulp.src([
            'bower_components/matchMedia/matchMedia.js',
            'bower_components/matchMedia/matchMedia.addListener.js',
            'bower_components/respond/dest/respond.src.js'
        ])
        .pipe(concat('legacy.js'))
        .pipe(uglify())
        .pipe(gulp.dest('.tmp/scripts'))
        .pipe(gulp.dest('scripts'))
        .pipe($.size());
});

// scripts - hint, concat, minify
gulp.task('scripts', ['vendor', 'legacy'], function () {
    return gulp.src('app/scripts/**/*.js')
        .pipe($.jshint())
        .pipe($.jshint.reporter(require('jshint-stylish')))
        .pipe($.concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('.tmp/scripts'))
        .pipe(gulp.dest('scripts'))
        .pipe($.size());
});

// generate assets and compile html from partials
// Note: useref needs paths relative to the given searchPath option (below) - NOT the partials themselves.
// As .tmp is populated first, this path will usually just be /scripts or /styles
gulp.task('html', ['styles', 'scripts'], function () {
    var jsFilter = $.filter('**/*.js');
    var cssFilter = $.filter('**/*.css');

    return gulp.src('app/**/*.html')
        .pipe(fileinclude({
          prefix: '@@',
            basepath: '@file'
        }))
        .pipe(gulp.dest('.tmp'))
        .pipe(gulp.dest('.'))
        .pipe($.size());
});

// minify svg & generate png fallbacks
gulp.task('svg', function () {
    gulp.src('app/images/**/*.svg')
        .pipe($.svg2png())
        .pipe(gulp.dest('images'))
        .pipe($.size());
});

// minify images, including svg
gulp.task('images', ['svg'], function () {
    return gulp.src('app/images/**/*')
        .pipe($.imagemin({
            optimizationLevel: 3,
            progressive: true,
            interlaced: true,
            use: [pngquant()]
        }))
        .pipe(gulp.dest('images'))
        .pipe($.size());
});

// move fonts to dist
gulp.task('fonts', function () {
    return gulp.src('app/webfonts/**/*')
        .pipe($.filter('**/*.{eot,svg,ttf,woff,otf}'))
        .pipe(gulp.dest('webfonts'))
        .pipe($.size());
});

// // move all misc files to dist
// gulp.task('extras', function () {
//     return gulp.src(['app/*.*'], { dot: true })
//         .pipe(gulp.dest('/'));
// });


gulp.task('minify', ['styles', 'scripts'], function () {
    return gulp.src(['.tmp/**/*.css', '.tmp/**/*.js'])
        .pipe(gulpif('*.css', $.csso()))
        .pipe(gulpif('*.css', inlineBase64({
            baseDir: 'app/scss/',
            maxWeightResource: 14 * 1024
        })))
        .pipe(cssBase64({
            baseDir: '../../app/css',
            maxWeightResource: 307200,
            extensionsAllowed: ['.ttf', '.woff']
        }))
        .pipe(gulp.dest('.'))
        .pipe($.size());
});

gulp.task('clone', function () {
    return gulp.src(['.tmp/**/*.css', '.tmp/**/*.js'])
        .pipe(gulp.dest('.'))
        .pipe($.size());
});

// tidy up partials that are generated by html task
gulp.task('tidy', function () {
    gulp.src(['.tmp/partials'], { read: false }).pipe($.clean());
    gulp.src(['partials'], { read: false }).pipe($.clean());
});

// clean generated code
gulp.task('clean', function () {
    return gulp.src(['images', 'styles', 'scripts', 'webfonts', '.tmp'], { read: false }).pipe($.clean());
});

// build dist
gulp.task('build', ['minify', 'images', 'fonts'], function () {
});

// default task - cleans and then builds
gulp.task('default', ['clean'], function () {
    gulp.start('build');
});

// watch for changes
gulp.task('watch', function () {
    watching = true;

    gulp.watch('app/scss/**/*.scss', ['styles']);
    gulp.watch('app/webfonts/**/*', ['fonts']);
    gulp.watch('app/scripts/**/*.js', ['scripts']);
    gulp.watch('app/.tmp/**/*', ['clone']);
    gulp.watch('app/images/**/*', ['images']);
});
