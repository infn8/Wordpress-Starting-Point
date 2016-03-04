var gulp        = require('gulp');
var sass        = require('gulp-sass');
var sourcemaps  = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var browserSyncOptions = require('./gulp.browser-sync.json');
var svgmin      = require('gulp-svgmin');

gulp.task('serve', ['styles'], function() {
    browserSync.init(browserSyncOptions);
    gulp.watch('sass/**/*.scss',['styles']);
    gulp.watch('svg/**/*.svg',['svgminify']);
    gulp.watch(['**/*.php', 'js/**/*.js']).on('change', browserSync.reload);
});


gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded', precision: 12}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./css/'))
        .pipe(browserSync.stream());
});

gulp.task('svgminify', function() {
    gulp.src('svg/**/*.svg')
    .pipe(svgmin({
        js2svg: {
            pretty: true,
            indent: "\t"
        },
        plugins: [
            {
                cleanupIDs: false
            },
            {
                cleanupAttrs: true
            },
            {
                cleanUpEnableBackground: true
            },
            {
                removeXMLProcInst: true
            },
            {
                removeDoctype: true
            },
            {
                removeComments: true
            },
            {
                removeDimensions : true
            }
        ]
    }))
    .pipe(gulp.dest('./svgmin'))
    .pipe(browserSync.reload())
    ;
});

gulp.task('default', ['serve']);
