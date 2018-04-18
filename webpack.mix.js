let mix = require('laravel-mix');

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

mix.js('resources/assets/js/vendor.js', 'public/js')
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/views/users.js', 'public/js/views')
    .js('resources/assets/js/views/valves.js', 'public/js/views')
    .js('resources/assets/js/views/account_settings.js', 'public/js/views')
    .js('resources/assets/js/models/user.js', 'public/js/models')
    .sass('resources/assets/sass/app.scss', 'public/css');
