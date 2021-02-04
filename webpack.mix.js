const mix = require('laravel-mix')

mix.sass('resources/sass/app.sass', 'public/css')
	.js('resources/js/app.js', 'public/js')
    .disableNotifications()
    .version()