import path from 'path';
import HtmlWebpackPlugin from 'html-webpack-plugin';
import WebpackBar from 'webpackbar';
import createFontFile from '../bud/createFontFile.mjs';
const htmlPageNames = ['index', 'teaser'];
let entryPoints = {};

createFontFile('../fonts/');

/**
 * Creates a new entry for each page provided in htmlPageNames
 */
let multipleHtmlPlugins = htmlPageNames.map(name => {
    return new HtmlWebpackPlugin({
        template: `./html/${name}.html`, // relative path to the HTML files
        filename: `${name}.html`, // output HTML files
        chunks: [`${name}`] // respective JS files
    })
});

/**
 * Example output
 * entry: {
 *         index: './index.js',
 *         teaser: './index.js',
 *     }
 *
 * Using the same JS file for both pages
 */
htmlPageNames.map(name => {
    entryPoints = {...entryPoints, [name]: './index.js'};
});

export default{
    mode: 'development',
    entry: entryPoints,
    // not meant for production
    devtool: 'inline-source-map',
    devServer: {
        static: ['./dist', './html'],
    },
    plugins: [
        new WebpackBar({
            name: 'neofluxe webpack',
            color: '#00D4B4'
        })
    ].concat(multipleHtmlPlugins),
    output: {
        assetModuleFilename: "[name][ext]",
        filename: '[name].js',
        path: path.resolve('dist'),
        clean: true,
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    // Creates `style` nodes from JS strings
                    "style-loader",
                    // Translates CSS into CommonJS
                    "css-loader",
                    {
                        // Rewrites URLs
                        loader: 'resolve-url-loader',
                        options: {}
                   },
                    {
                        // Compiles Sass to CSS
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true, // <-- !!IMPORTANT!!
                        }
                    },
                ],
            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                type: 'asset/resource',
            },
            {
                test: /\.html$/i,
                loader: "html-loader",
                options: {},
            },
        ],
    },
    optimization: {
        runtimeChunk: 'single',
    },
};