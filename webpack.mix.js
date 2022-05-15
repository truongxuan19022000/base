const mix = require('laravel-mix');

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

 mix.options({
    processCssUrls: false // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
  })
  .sass('resources/sass/admin/layout.scss', 'public/assets/admin/css')
  .sass('resources/sass/admin/perfect-scrollbar.scss', 'public/assets/admin/css')
  .sass('resources/sass/admin/style.scss', 'public/assets/admin/css')
  .sass('resources/sass/admin/sidebar.scss', 'public/assets/admin/css')

  .sass('resources/sass/vendor/layout.scss', 'public/assets/vendor/css')
  .sass('resources/sass/vendor/style.scss', 'public/assets/admin/css')

  .sass('resources/sass/web/layout.scss', 'public/assets/web/css')
  .sass('resources/sass/web/style.scss', 'public/assets/web/css')
 ;
