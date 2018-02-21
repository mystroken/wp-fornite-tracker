/**
 * Gulp
 *
 * Implements
 * 		1. Live reloads browser with BrowserSync.
 * 		2. CSS: Sass to Css conversion, Autoprefixing, Sourcemaps,
 * 			 CSS minification, and Merge Media Queries.
 *
 * @uthor Mystro Ken <mystroken@gmail.com>
 * @version 1.0
 */


 // Style configuration.
 var style_src               = './assets/styles/main.scss';
 var style_dest              = './assets/css/';

 // Watch files paths.
 var style_watch_files       = './assets/styles/**/*.scss';


 // Browsers we care about for autoprefixing.
 // Browserlist https://github.com/ai/browserslist
 const AUTOPREFIXER_BROWSERS = [
	'last 2 version',
	'> 1%',
	'ie >= 9',
	'ie_mob >= 10',
	'ff >= 30',
	'chrome >= 34',
	'safari >= 7',
	'opera >= 23',
	'ios >= 7',
	'android >= 4',
	'bb >= 10'
 ];


 // STOP Editing project variables

 /**
	* Load Plugins
	*
	*/
var gulp         = require('gulp');

var sass         = require('gulp-sass');
var minifycss    = require('gulp-uglifycss');
var autoprefixer = require('gulp-autoprefixer');
var mmq          = require('gulp-merge-media-queries');

var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var lineec       = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
var filter       = require('gulp-filter'); // Enables you to work on a subset of the original files by filtering them using globbing.
var sourcemaps   = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var notify       = require('gulp-notify'); // Sends message notification to you

/**
 * Task: `styles`
 */
gulp.task('styles', function(){
	gulp.src(style_src)
	.pipe(sourcemaps.init())
	.pipe(sass({
		errorLogToConsole: true,
		outputStyle: 'compact',
		precision: 10
	}))
	.on('error', console.error.bind(console))
	.pipe(sourcemaps.write({includeContent: false}))
	.pipe(sourcemaps.init({loadMaps: true}))
	.pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
	.pipe(sourcemaps.write('./'))
	.pipe(lineec())
	.pipe(gulp.dest(style_dest))

	.pipe(filter('**/**/*.css'))
	.pipe(mmq({log: true}))

	.pipe(rename({suffix: '.min'}))
	.pipe(minifycss({maxLineLen: 10}))
	.pipe(lineec())
	.pipe(gulp.dest(style_dest))

	.pipe(filter('**/**/*.css'))
	.pipe(notify({message: 'TASK: "styles" completed!', onLast: true}))
});


/**
 * Watch Tasks.
 */
gulp.task('default', ['styles'], function(){
	gulp.watch(style_watch_files, ['styles']);
});
