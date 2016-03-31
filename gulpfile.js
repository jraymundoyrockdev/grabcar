var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.styles([
        'application.min.css'
    ], 'public/css/libraries.css');

    mix.scripts([
        'vendor/jquery.min.js',
        'vendor/bootstrap.min.js',
        'vendor/jquery.pjax.js',
        'vendor/widgster.js',
        'vendor/underscore.js',
        'vendor/settings.js',
        'vendor/jquery.dataTables.min.js',
        'vendor/jquery.number.js',
        'vendor/bootstrap-select.min.js',
        'vendor/select2.min.js',
        'vendor/moment.js',
        'vendor/bootstrap-datetimepicker.min.js',
        'vendor/highcharts.js',
        'vendor/data.js',
        'app.js'
    ], 'public/js/libraries.js');
});
