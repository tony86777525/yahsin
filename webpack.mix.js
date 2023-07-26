const mix = require('laravel-mix');
const glob = require('glob');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

// mix.js('resources/js/web/app.js', 'public/js')
//     .sass('resources/sass/web/index.scss', 'public/css')
// js compile

const ignoreFiles = {
    'js': [],
};

glob.sync('resources/js/**/*.js', {
    ignore: ignoreFiles['js']
}).map(function (file) {
    let output = file.replace(/resources\/js/, 'public\/js');

    mix.js(file, output)
});

// sass compile
glob.sync('resources/sass/**/*.scss', {
    ignore: ignoreFiles['sass']
}).map(function (file) {
    let output = file.replace(/resources\/sass/, 'public\/css');

    mix.sass(file, output.replace(/\.scss/, '.css'));
});
