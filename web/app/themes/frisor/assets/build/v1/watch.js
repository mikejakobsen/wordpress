// External dependencies
const webpack = require('webpack');
const webpackDevMiddleware = require('webpack-dev-middleware');
const webpackHotMiddleware = require('webpack-hot-middleware');
const browserSync = require('browser-sync');

// Internal dependencies
const webpackConfig = require('./webpack.config');
const config = require('./config');

// Internal variables
const host = 'http://localhost';
const port = config.devPort || '3000';

webpackConfig.output.publicPath = `${host}:${port}${config.publicPath}`;
const compiler = webpack(webpackConfig);

browserSync.init({
  port,
  proxy: {
    target: config.devUrl,
    middleware: [
      webpackDevMiddleware(compiler, {
        publicPath: config.publicPath,
        stats: {
          colors: true,
          chunks: false,
        },
      }),
      webpackHotMiddleware(compiler, {
        log: browserSync.notify,
      }),
    ],
  },
  files: [
    'templates/**/*.php',
    'src/**/*.php',
  ],
});
