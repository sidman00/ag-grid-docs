const merge = require('webpack-merge');
const common = require('./common');
const tsChecker = require('./fork-ts-checker.ts');

const webpack = require('webpack');
const path = require('path');

module.exports = merge(common, {
    entry: {
        main: './src/_assets/ts/ag-grid-enterprise-main'
    },
    output: {
        filename: '[name].js',
        library: ['agGrid'],
        libraryTarget: 'umd',
        publicPath: '/'
    },

    externals: {
        'ag-grid': 'ag-grid',
        'ag-grid/main': 'ag-grid'
    },

    plugins: [
        tsChecker(), 
        new webpack.NamedModulesPlugin(), 
        new webpack.HotModuleReplacementPlugin()
    ]
});
