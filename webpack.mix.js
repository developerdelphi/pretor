const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js([
    'resources/js/app.js',
    'resources/assets/material-dashboard/js/material-dashboard.js',
    'resources/assets/material-dashboard/js/core/bootstrap-material-design.min.js',
  ], 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
