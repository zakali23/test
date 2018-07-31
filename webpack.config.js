var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .addEntry('style', './assets/scss/main.scss')
    .addEntry('header', './assets/scss/header.scss')
    .addEntry('entreprise', './assets/scss/entreprise.scss')
    .addEntry('login', './assets/scss/login.scss')
    .addEntry('main_admin', './assets/scss/main_admin.scss')
    .addEntry('header_admin', './assets/js/header_admin.js')
    .addEntry('head_admin', './assets/scss/head_admin.scss')
    .addEntry('user', './assets/scss/user.scss')
    .addEntry('register1', './assets/scss/register1.scss')
    .addEntry('register', './assets/js/register.js')
    .addEntry('user_edit', './assets/js/user_edit.js')
    .addEntry('ajax_immeuble', './assets/js/ajaxCopro.js')
    .addEntry('ajax_lots', './assets/js/ajaxLots.js')
    .addEntry('ajax_pieces', './assets/js/ajaxPieces.js')
    .addEntry('ajax', './assets/js/ajaxRequestFromImmeuble.js')
    .addEntry('error', './assets/scss/error.scss')



    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader();

module.exports = Encore.getWebpackConfig();

