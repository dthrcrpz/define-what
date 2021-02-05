const mix = require('laravel-mix')

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.sass', 'public/css')
    .disableNotifications()
    .version()