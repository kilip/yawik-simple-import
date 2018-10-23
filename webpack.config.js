let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('test/sandbox/public/build/')
    .setPublicPath('/build')
    .addEntry('yawik', './test/sandbox/public/modules/Core/yawik.js')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableLessLoader()
    .autoProvideVariables({
        'global.$': 'jquery',
        jQuery: 'jquery',
        'global.jQuery': 'jquery',
    })
;

const core = Encore.getWebpackConfig();
core.name = 'core';
core.resolve = {
    extensions: ['.js'],
    alias: {
        'jquery-ui/ui/widget': 'blueimp-file-upload/js/vendor/jquery.ui.widget.js'
    }
};

module.exports = core;