/* https://gist.github.com/demisx/9512212 excample
http://willi.am/blog/2014/08/16/gulp-automation-path-abstraction/

Good example: https://gist.github.com/samuelhorn/8743217 */
var gulp = require('gulp'),
    karma = require('gulp-karma'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    header = require('gulp-header'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    plumber = require('gulp-plumber'),
    clean = require('gulp-clean'),
    rename = require('gulp-rename'),
    copy = require('gulp-copy'),
    markdox = require("gulp-markdox"),
    stripCssComments = require('gulp-strip-css-comments'),
    //phplint = require('phplint').lint,
    package = require('./package.json');

var sharedPath = 'shared/assets/js/frontend/analytics-src/';
var paths = {
    output: 'shared/assets/js/frontend/analytics/',
    scripts: [
        sharedPath + 'analytics.init.js',
        sharedPath + 'analytics.hooks.js',
        sharedPath + 'analytics.utils.js',
        sharedPath + 'analytics.forms.js',
        sharedPath + 'analytics.events.js',
        sharedPath + 'analytics.storage.js',
        sharedPath + 'analytics.lead.js',
        sharedPath + 'analytics.page.js',
        sharedPath + 'analytics.start.js',
        //sharedPath + 'analytics.examples.js',
    ],
    test: [
        'tests/spec/**/*.js'
    ]
};

var banner = [
    '/*! ',
    'Inbound Analytics',
    'v<%= package.version %> | ',
    '(c) ' + new Date().getFullYear() + ' <%= package.author %> |',
    ' <%= package.homepage %>',
    ' */',
    '\n'
].join('');

/* CSS Gulp processes */
var cssHead = [
    '/**\n',
    ' * This CSS is compiled from the THIS_FILE_NAME.post.css version of this file\n',
    ' * Any edits you make in this file will not be saved\n',
    ' */',
    '\n\n'
].join('');
var postcss = require('gulp-postcss'),
    processors = [
        require('postcss-mixins'),
        require('postcss-simple-vars'),
        require('postcss-nested'),
        require('postcss-focus'),
        require('autoprefixer-core')({ browsers: ['last 2 versions', '> 2%'] })
    ];

gulp.task('css', function() {
  return gulp.src('./shared/assets/css/*.post.css')
    .pipe(stripCssComments())
    .pipe(postcss(processors))
    .pipe(rename(function (path) {
        path.basename = path.basename.replace('.post', '');
    }))
    .pipe(header(cssHead))
    .pipe(gulp.dest('./shared/assets/css/'));
});
gulp.task('css-watch', function() {
    //gulp.watch('shared/assets/js/frontend/analytics-src/*.js', ['lint', 'scripts']);
    gulp.watch('./shared/assets/css/*.post.css', ['css']);
    //gulp.watch('scss/*.scss', ['sass']);
});

//gulp.task('phplint', function(cb) {
    //phplint(['src/**/*.php'], {
 //   phplint(['calls-to-action.php'], {
//        limit: 10
 //   }, function(err, stdout, stderr) {
 //       if (err) {
   //         console.log(err);
  ////          cb(err);
   //         process.exit(1);
   //     }
   //     cb();
  //  });
//});

gulp.task('test', ['phplint']);

gulp.task('scripts', ['clean'], function() {
    return gulp.src(paths.scripts)
        .pipe(plumber())
        .pipe(concat('inboundAnalytics.js'))
        .pipe(header(banner, {
            package: package
        }))
        .pipe(gulp.dest('shared/assets/js/frontend/analytics/'))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(header(banner, {
            package: package
        }))
        .pipe(gulp.dest('shared/assets/js/frontend/analytics/'));
});

gulp.task('lint', function() {
    return gulp.src(paths.scripts)
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('clean', function() {
    return gulp.src(paths.output, {
            read: false
        })
        .pipe(plumber())
        .pipe(clean());
});

gulp.task('test', function() {
    return gulp.src(paths.scripts.concat(paths.test))
        .pipe(plumber())
        .pipe(karma({
            configFile: 'tests/karma.conf.js'
        }))
        .on('error', function(err) {
            throw err;
        });
});

/* Watch Files For Changes */

gulp.task('watch', function() {
    //gulp.watch('shared/assets/js/frontend/analytics-src/*.js', ['lint', 'scripts']);
    gulp.watch('shared/assets/js/frontend/analytics-src/*.js', ['default']);
    //gulp.watch('scss/*.scss', ['sass']);
});

gulp.task("doc", function() {
    gulp.src("shared/assets/js/frontend/analytics-src/*.js")
        .pipe(markdox())
        .pipe(rename({
            extname: ".md"
        }))
        .pipe(gulp.dest("./docs/docs"));
});


/* concat docs */
gulp.task("maindoc", function() {
    gulp.src("shared/assets/js/frontend/analytics-src/*.js")
        .pipe(markdox())
        .pipe(concat("main.md"))
        .pipe(gulp.dest("./shared/docs"));
});

gulp.task("docs", function() {
    gulp.src("shared/assets/js/frontend/analytics/inboundAnalytics.js")
        .pipe(markdox())
        .pipe(rename({
            extname: ".md"
        }))
        .pipe(gulp.dest("./docs/docs"));
});

gulp.task("generateDocs", function() {
    gulp.src("shared/assets/js/frontend/analytics-src/analytics.events.js")
        .pipe(markdox())
        .pipe(rename({
            extname: ".md"
        }))
        .pipe(gulp.dest("./shared/docs"));
});

/* sync shared folders with `sudo gulp sync` */
gulp.task('sync', [ 'sync-lp', 'sync-leads', 'sync-pro', 'sync-translations']);
gulp.task('sync-lp', function () {
        return gulp.src(['./shared/**']).pipe(gulp.dest('../landing-pages/shared/'));
});
gulp.task('sync-leads', function () {
        return gulp.src(['./shared/**']).pipe(gulp.dest('../leads/shared/'));
});
gulp.task('sync-pro', function () {
    return gulp.src(['./shared/**'])
        .pipe(gulp.dest('./../_inbound-now/core/shared/'));
});
gulp.task('sync-translations', function () {
    return gulp.src(['../translations/lang/**.mo'])
        .pipe(gulp.dest('./../_inbound-now/assets/lang'));
});
/* end sync */

gulp.task('default', [
    'lint',
    'clean',
    'scripts',
    'generateDocs'
    // 'test'
]);