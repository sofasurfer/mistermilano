/**
 * @typedef {import('@roots/bud').Bud} bud
 *
 * @param {bud} app
 */

module.exports = async (app) => {
    app
        .hash()
        /**
         * Set up alias paths for referencing files
         */
        .alias('scripts', app.path('@src/scripts'))
        .alias('styles', app.path('@src/styles'))
        .alias('images', app.path('@src/images'))
        .alias('fonts', app.path('@src/fonts'))
        /**
         * Application entrypoints
         *
         * Paths are relative to your resources directory
         * meaning of the "@" symbol https://stackoverflow.com/a/42711271/7262739
         */
        .entry({
            index: ['@src/scripts/index.js', '@src/styles/main.scss'],
        })

        /**
         * These files should be processed as part of the build
         * even if they are not explicitly imported in application assets.
         */
        .assets('fonts', 'images')

        /**
         * These files will trigger a full page reload
         * when modified.
         */
        .watch('@src/**/*')

        /**
         * Target URL to be proxied by the dev server.
         *
         * This should be the URL you use to visit your local development server.
         */
        .proxy('http://localhost/')

        /**
         * Development URL to be used in the browser.
         */
        .serve('http://localhost:3010/')

        /**
         * Public path of application assets
         */
        // .setPublicPath('/wp-content/themes/nf-starter/dist/');
};
