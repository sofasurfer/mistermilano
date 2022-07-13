const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
// const HtmlWebpackPlugin = require('lodash-template-webpack');

module.exports = {
    mode: 'development',
    entry: {
        index: './index.js',
    },
    // not meant for production
    devtool: 'inline-source-map',
    devServer: {
        static: './dist',
    },
    plugins: [
        new HtmlWebpackPlugin({
            template: './index.html',
        }),
    ],
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'dist'),
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
            // {
            //     test: /(\.tpl|\.html)$/,
            //     loader: 'lodash-template-webpack-loader',
            // },
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