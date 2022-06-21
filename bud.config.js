/**
 * @typedef {import('@roots/bud').Bud} bud
 *
 * @param {bud} app
 */

module.exports = async (app) => {
    app
        /**
         * Application entrypoints
         *
         * Paths are relative to your resources directory
         * meaning of the "@" symbol https://stackoverflow.com/a/42711271/7262739
         */
        .entry({
            app: ['@src/scripts/index', '@src/styles/main'],
            // editor: ['@scripts/editor', '@styles/app', '@styles/editor'],
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
        .watch('src/**/*')

        // /**
        //  * Target URL to be proxied by the dev server.
        //  *
        //  * This should be the URL you use to visit your local development server.
        //  */
        // .proxy(app.env.get('BUD_URL_PROXY'))
        //
        // /**
        //  * Development URL to be used in the browser.
        //  */
        // .serve(app.env.get('BUD_URL_SERVE'))
        //
        // /**
        //  * Public path of application assets
        //  */
        // .setPublicPath(app.env.get('BUD_URL_PUBLICPATH'));
};