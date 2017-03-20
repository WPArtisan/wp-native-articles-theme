/**
 * GULPFILE - By @wearearchitect
 */

/*-----------------------------------------*\
	VARIABLES
\*-----------------------------------------*/

// Dependencies
var $              = require('gulp-load-plugins')()
	, gulp         = require('gulp')
	, del          = require('del')
	, fs           = require('fs')
	, path         = require('path')
	, merge        = require('merge-stream')
	, runSequence  = require('run-sequence')

	// Base Paths
	, basePaths = {
		src  : './build/',
		dest : './assets/'
	}

	// Assets Folder Paths
	, paths = {
		img  : basePaths.src + 'img/**/*',
		fonts : basePaths.src + 'fonts/**/*',
		scss : basePaths.src + 'scss/**/*.scss',
		js   : {
			src    : basePaths.src + 'js'
		}
	};


/*-----------------------------------------*\
	ERROR NOTIFICATION
	- Beep!
\*-----------------------------------------*/

onError = function(err) {
	$.notify.onError({
		title    : "Gulp",
		subtitle : "Failure!",
		message  : "Error: <%= error.message %>",
		sound    : "Beep"
	})(err);
	this.emit('end');
};

/*-----------------------------------------*\
	 STYLES TASK
	 - Catch errors via gulp-plumber
	 - Compile Sass
	 - Vendor prefix
	 - Output unminified CSS for debugging
	 - Rename
	 - Minify
	 - Output minified CSS
\*-----------------------------------------*/

gulp.task('styles', function () {
	return gulp.src(paths.scss)
		.pipe( $.plumber({errorHandler: onError}) )
		.pipe( $.sass({ style: 'expanded', }))
		.pipe( $.autoprefixer( 'last 2 version' ) )
		.pipe( gulp.dest(basePaths.dest + '_css') )
		.pipe( $.rename({ suffix: '.min' }) ) // Remove to generate style.css for WordPress
		.pipe( $.minifyCss({
			//https://www.npmjs.com/package/clean-css#how-to-set-compatibility-mode
			compatibility : 'ie7,' +
				'-units.ch,' +
				'-units.in,' +
				'-units.pc,' +
				'-units.pt,' +
				'-units.rem,' +
				'-units.vh,' +
				'-units.vm,' +
				'-units.vmax,' +
				'-units.vmin'
		}))
		.pipe( gulp.dest(basePaths.dest + '_css') )
		.pipe( $.size({title: 'Styles'}));
});

/*-----------------------------------------*\
	SASS LINTING
	- Keep your code squeaky clean
\*-----------------------------------------*/

gulp.task('lint', function() {
	return gulp.src(paths.scss)
	.pipe( $.plumber({errorHandler: onError}) )
	.pipe( $.scssLint( {
		'bundleExec': true,
		'config': '.scss-lint.yml',
		'reporterOutput': 'scss-lint-report.xml'
	}));
});

/*-----------------------------------------*\
	 SCRIPTS TASK
	 - Catch errors via gulp-plumber
	 - Hint
	 - Concatenate assets/js/** **.js
	 - Output unminified JS for debugging
	 - Minify
	 - Rename
	 - Output minified JS
\*-----------------------------------------*/

gulp.task('scripts', function(){

	var folders = getFolders( paths.js.src );

	var tasks = folders.map(function( folder ) {
		return gulp.src( path.join( basePaths.src + 'js', folder, '/**/*.js' ) )
			.pipe( $.concat( folder + '.js' ) )
			.pipe( gulp.dest( basePaths.dest + '_js' ) )
			.pipe( $.uglify())
			.pipe( $.rename( folder + '.min.js' ) )
			.pipe( gulp.dest( basePaths.dest + '_js' ) );
	});

	var root = gulp.src( paths.js.src + '/*.js' )
		.pipe( $.plumber({ errorHandler: onError }) )
		.pipe( $.jshint() )
		.pipe( $.jshint.reporter('default') )
		.pipe( gulp.dest( basePaths.dest + '_js' ) )
		.pipe( $.uglify() )
		.pipe( $.rename({ suffix: '.min' }) )
		.pipe( gulp.dest( basePaths.dest + '_js' ) );

	return merge( tasks, root )
		.pipe( $.size({ title: 'Scripts' }) );

});

/*-----------------------------------------*\
	 FONTS TASK
	 - Copy all fonts to  /assets/_fonts
\*-----------------------------------------*/

gulp.task('fonts', function() {
	return gulp.src(paths.fonts)
		.pipe(gulp.dest( basePaths.dest + '_fonts'));
});

/*-----------------------------------------*\
	 IMAGE TASK
	 - Copy all images to  /assets/_img
\*-----------------------------------------*/

gulp.task('images', function() {
	return gulp.src(paths.img)
		.pipe(gulp.dest( basePaths.dest + '_img'));
});

/*-----------------------------------------*\
	 BOWER TASK
	 - Copy all Bower libs to /assets/_lib
\*-----------------------------------------*/

gulp.task('bower', function() {
	return $.bowerSrc()
		.pipe( gulp.dest( basePaths.dest + '_lib' ) );
});

/*-----------------------------------------*\
	 DEV TASK
	 - Speedy!
\*-----------------------------------------*/

gulp.task('dev', function() {
	gulp.start('scripts', 'styles');
});

/*-----------------------------------------*\
	 CLEAN OUTPUT DIRECTORIES
\*-----------------------------------------*/

gulp.task('clean', function(cb) {
	return del([
		basePaths.dest + '_*'
	], { read: false }, cb)
});

/*-----------------------------------------*\
	 MANUAL DEFAULT TASK
	 - Does everything
	 - Tasks in array run in parralel
\*-----------------------------------------*/

gulp.task('default', ['clean'], function(cb) {
		runSequence(['styles', 'scripts', 'fonts', 'bower', 'images'], cb);
});

/*-----------------------------------------*\
	 WATCH
	 - Watch assets & public folder
	 - Auto-reload browsers
\*-----------------------------------------*/

gulp.task('watch', function() {
	gulp.watch(paths.img, ['images']);
	gulp.watch(paths.fonts, ['fonts']);
	gulp.watch(paths.scss, ['styles']);
	gulp.watch(paths.js.src + '/**/*.js', ['scripts']);
});


/**
 * A helper function that gets all the
 * files in a folder
 * @param  string dir
 * @return obj
 */
function getFolders( dir ) {
	return fs.readdirSync( dir )
		.filter(function( file ) {
			return fs.statSync( path.join( dir, file ) ).isDirectory();
		});
}
