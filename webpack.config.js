'use strict';

const HtmlPlugin = require('html-webpack-plugin');

module.exports = {
    module: {
        loaders: [
            {
                test: /\.jsx?$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
                query: {
                    presets: ['react', 'es2015']
                }
            },
            {
                test: /\.scss$/,
                loader: 'style!css!sass!sass-resources'
            },
            {
                test: /bootstrap\/dist\/js\/umd\//,
                loader: 'imports?jQuery=jquery'
            },
            { test: /\.(woff2?|svg)$/, loader: 'url?limit=10000' },
            { test: /\.(ttf|eot)$/, loader: 'file' }
        ],
    },
    
    
};