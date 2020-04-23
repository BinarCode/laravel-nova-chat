let mix = require('laravel-mix');

mix.setPublicPath('dist')
   .js('resources/js/chat.js', 'js')
   .sass('resources/sass/chat.scss', 'css');
