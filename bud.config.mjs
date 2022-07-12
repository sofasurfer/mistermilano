import createFontFile from './src/bud/createFontFile.mjs';

/**
 * @typedef {import('@roots/bud').Bud} bud
 *
 * @param {bud} bud
 */

export default async (bud) => {
    createFontFile('./src/fonts/');

    bud
        .when(
            bud.isProduction,
            () => bud.hash().minimize(),
        )

        /**
         * Application entrypoints
         *
         * Paths are relative to your resources directory
         * meaning of the "@" symbol https://stackoverflow.com/a/42711271/7262739
         */
        .entry({
            index: ['@src/scripts/index.js', '@src/styles/main.scss'],
            editor: ['@src/scripts/editor.js', '@src/styles/editor.scss'],
        })

        /**
         * These files should be processed as part of the build
         * even if they are not explicitly imported in application assets.
         */
        .assets(['images'])

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
        .serve('http://localhost:3010/nf-starter/')

        /**
         * Public path of application assets
         */
        .setPublicPath('/');
};