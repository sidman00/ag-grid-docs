const fs = require('fs');
const cp = require('child_process');
const path = require('path');
const express = require('express');
const realWebpack = require('webpack');
const proxy = require('express-http-proxy');
const webpackMiddleware = require('webpack-dev-middleware');
const hotMiddleware = require('webpack-hot-middleware');

const EXPRESS_PORT = 8080;
const PHP_PORT = 8888;
const HOST = '127.0.0.1';

function addWebpackMiddleware(app, configPath, prefix) {
    const webpackConfig = require(path.resolve('./webpack-config/', configPath + '.js'));
    const compiler = realWebpack(webpackConfig);

    app.use(
        prefix,
        webpackMiddleware(compiler, {
            noInfo: true,
            publicPath: '/'
        })
    );

    app.use(prefix, hotMiddleware(compiler));
}

function launchPhpCP(app) {
    const php = cp.spawn('php', ['-S', `${HOST}:${PHP_PORT}`, '-t', 'src'], {
        stdio: 'inherit',
        env: {AG_DEV: 'true'}
    });

    app.use(
        '/',
        proxy(`${HOST}:${PHP_PORT}`, {
            proxyReqOptDecorator: function(proxyReqOpts, srcReq) {
                proxyReqOpts.headers['X-PROXY-HTTP-HOST'] = srcReq.headers.host;
                return proxyReqOpts;
            }
        })
    );
}

function serveAndWatchAngular(app) {
    const angularWatch = cp.spawn('gulp', ['watch'], {
        stdio: 'inherit',
        cwd: '../ag-grid-angular'
    });

    app.use('/dev/ag-grid-angular', express.static('../ag-grid-angular'));
}

function launchTSCCheck() {
    if (!fs.existsSync('_dev')) {
        console.log('_dev not present, creating links...');

        const linkType = 'symbolic';
        mkdirp('_dev/ag-grid/dist');
        lnk('../ag-grid/exports.ts', '_dev/ag-grid/', {force: true, type: linkType, rename: 'main.ts'});
        lnk('../ag-grid/src/ts', '_dev/ag-grid/dist', {force: true, type: linkType, rename: 'lib'});
        lnk('../ag-grid-enterprise/', '_dev', {force: true, type: linkType});
        lnk('../ag-grid-react/', '_dev', {force: true, type: linkType});
        lnk('../ag-grid-angular/', '_dev', {force: true, type: linkType});
    }

    const tsChecker = cp.spawn('tsc', ['--watch', '--noEmit']);

    tsChecker.stdout.on('data', data => {
        data
            .toString()
            .trim()
            .split('\n')
            .filter(line => line.indexOf('Watching for') === -1 && line.indexOf('File change') === -1)
            .forEach(line =>
                console.log('ts-checker:'.green, line.replace('_dev', '..').replace('/dist/lib/', '/src/ts/').red)
            );
    });
}

module.exports = callback => {
    const app = express();

    // necessary for plunkers
    app.use(function(req, res, next) {
        res.setHeader('Access-Control-Allow-Origin', '*');
        return next();
    });

    // serve ag-grid, enterprise and react
    addWebpackMiddleware(app, 'standard', '/dev/ag-grid/');
    addWebpackMiddleware(app, 'site', '/dist/');
    addWebpackMiddleware(app, 'enterprise', '/dev/ag-grid-enterprise');
    addWebpackMiddleware(app, 'enterprise-bundle', '/dev/ag-grid-enterprise-bundle');
    addWebpackMiddleware(app, 'react', '/dev/ag-grid-react');

    // angular is another story
    serveAndWatchAngular(app);

    // PHP
    launchPhpCP(app);

    // Watch TS for errors. No actual transpiling happens here, just errors
    launchTSCCheck();

    app.listen(EXPRESS_PORT, function() {
        console.log(`ag-Grid dev server available on http://${HOST}:${EXPRESS_PORT}`);
    });
};
