/**
 * @typedef {import('@roots/bud').Bud} bud
 *
 * @param {bud} bud
 */

/**
 * Creates a SCSS file with variables including the fonts
 */
function createFontFile () {
    const fontPath = './src/fonts/'
    const fs = require('fs')
    fs.readdir(fontPath, (err, filenames) => {
        let fontArray = [];
        let cssString = '';

        filenames.forEach(filename => {
            if (filename.endsWith('.woff') || filename.endsWith('.woff2') || filename.endsWith('.ttf') || filename.endsWith('.otf') || filename.endsWith('.eot')) {
                const fontName = filename.split('.')[0]
                const fontExtension = filename.split('.')[1]
                let font = fs.readFileSync(fontPath + filename)
                font = Buffer.from(font).toString('base64')

                fontArray.push({
                    name: fontName + '_' + fontExtension,
                    data: `data:font/woff2;charset=utf-8;base64,${font}`,
                    fileExtension: filename.split('.').pop()
                })
            }
        })

        fontArray.forEach(font => {
            cssString += `
            $${font.name}: '${font.data}';
        `
        })

        fs.writeFileSync(fontPath + 'inlineFonts.scss', cssString);
    })
}

createFontFile();

module.exports = async (bud) => {
    bud
        .template({
                template: '/src/templates/contentelements.html',
                replace: {
                    IMAGES_URL: '/src/images',
                    PUBLIC_URL: '@dist/',
                }
            }
        )


        .when(
            bud.isProduction,
            () => bud.minimize(),
        )


        .hash()

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
        .assets('images')

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