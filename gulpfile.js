const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */
elixir(function(mix) {
    mix.styles([
        'bootstrap.css', //common regular bootstrap files for styling
        'jquery-ui.css', //jquery ui css
        'jquery-ui.structure.css', // jquery ui structure css
        'jquery-ui.theme.css', //jquery ui theme css
        'jquery.dataTables_themeroller.css',
        'font-awesome.css', //font awesome icons
        'elegant-icons-style.css',
        'jquery.dataTables.min.css', //dataTables css
        'fixedHeader.dataTables.min.css',
        'colReorder.dataTables.min.css',
        'select.dataTables.min.css',
        'keyTable.dataTables.min.css',
        'responsive.dataTables.min.css',
        'buttons.dataTables.min.css',
        'fullcalendar.min.css',
        'jquery.easy-pie-chart.css',
        'style.css',
        'line-icons.css',
        'owl.carousel.css',
        'widgets.css',
        'xcharts.min.css',
        'style-responsive.css',
        'jquery-jvectormap-1.2.2.css',
        // 'summernote.css', // for summernote editor
        'clean-blog.css',
        'select2.css',
        'general.css' // custom css styles

    ]);

    elixir(function(mix) {
        mix.scripts([
            'jquery.js', //jquery latest
            'bootstrap.js', //bootstrap js
            'jquery.dataTables.min.js', //jquery dataTables js
            'jquery-ui.js', //jquery ui js
            'jquery.scrollTo.min.js',
            'jquery.nicescroll.js',
            'jquery.knob.js',
            'jquery.sparkline.js',
            'jquery.easy-pie-chart.js',
            'jquery.slimscroll.min.js',
            'dataTables.fixedHeader.min.js',
            'dataTables.colReorder.min.js',
            'dataTables.select.min.js',
            'dataTables.keyTable.min.js',
            'dataTables.responsive.min.js',
            'dataTables.buttons.min.js',
            'buttons.flash.min.js',
            'jszip.min.js',
            'pdfmake.min.js',
            'vfs_fonts.js',
            'buttons.html5.min.js',
            'buttons.print.min.js',
            'owl.carousel.js',
            'jquery.rateit.min.js',
            'Chart.js',
            'scripts.js',
            'sparkline-chart.js',
            'easy-pie-chart.js',
            'jquery-jvectormap-1.2.2.min.js',
            'jquery-jvectormap-world-mill-en.js',
            'xcharts.min.js',
            'jquery.autosize.min.js',
            'jquery.placeholder.min.js',
            'jquery.customSelect.min.js',
            'gdp-data.js',
            'morris.min.js',
            'sparklines.js',
            'charts.js',
            'validator.js',
            'moment.min.js',
            'fullcalendar.min.js',
            'calendar-custom.js',
            'select2.full.js',
            'printThis.js',
            'jquery.number.min.js',
            // 'summernote.js', //for summernote editor
            'select2.full.js',
            'tinymce.min.js',
            'validator.js',
            'jqBootstrapValidation.js',
            'clean-blog.js',
            'contact_me.js',
            'readmore.js',
            'initialization.js', //various elements initialization scripts
            'general.js'

        ]);
    });

    elixir(function(mix) {
        mix.version(['css/all.css', 'js/all.js']); // Cache Busting aka Versioning
    });

});