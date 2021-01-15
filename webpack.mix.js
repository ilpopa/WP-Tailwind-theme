let mix = require('laravel-mix');
let path = require('path');

mix.setPublicPath(path.resolve('./'));

mix.js('resources/js/app.js', 'js');

mix.postCss("resources/css/app.css", "css");
mix.postCss("resources/css/editor-style.css", "./");

mix.options({
    postCss: [
        require('postcss-nested-ancestors'),
        require('postcss-nested'),
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]
});

mix.browserSync({
    proxy: 'http://tailwind.local/',
    host: '192.168.95.101',
    open: 'external',
    port: 8000
});

mix.version();
