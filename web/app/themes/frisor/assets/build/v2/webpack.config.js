'use strict'; // eslint-disable-line

const webpack = require('webpack');
const path = require('path');
const qs = require('qs');
const autoprefixer = require('autoprefixer');
const CleanPlugin = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

const CopyGlobsPlugin = require('./webpack.plugin.copyglobs');
const mergeWithConcat = require('./util/mergeWithConcat');
const config = require('./config');

const assetsFilenames = (config.enabled.cacheBusting) ? config.cacheBusting : '[name]';
const sourceMapQueryStr = (config.enabled.sourceMaps) ? '+sourceMap' : '-sourceMap';

const jsLoader = {
  test: /\.js$/,
  exclude: [/(node_modules|bower_components)(?![/|\\](bootstrap|foundation-sites))/],
  include: config.paths.assets,
  loaders: [{
    loader: 'babel',
    query: {
      presets: [[path.resolve('./node_modules/babel-preset-es2015'), { modules: false }]],
      cacheDirectory: true,
    },
  }],
};

if (config.enabled.watcher) {
  jsLoader.loaders.unshift('monkey-hot?sourceType=module');
}

let webpackConfig = {
  context: config.paths.assets,
  entry: config.entry,
  devtool: (config.enabled.sourceMaps ? '#source-map' : undefined),
  output: {
    path: config.paths.dist,
    publicPath: config.publicPath,
    filename: `scripts/${assetsFilenames}.js`,
  },
  module: {
    noParse: [
      /node_modules[\\/]video\.js/,
    ],
    rules: [
      jsLoader,
      {
        enforce: 'pre',
        test: /\.js?$/,
        include: config.paths.assets,
        exclude: /(node_modules|bower_components|modernizr.js)/,
        loader: 'eslint',
      },
      {
        test: /\.css$/,
        include: config.paths.assets,
        loader: ExtractTextPlugin.extract({
          fallbackLoader: 'style',
          loader: [
            `css?${sourceMapQueryStr}`,
            'postcss',
          ],
        }),
      },
      {
        test: /\.scss$/,
        include: config.paths.assets,
        loader: ExtractTextPlugin.extract({
          fallbackLoader: 'style',
          loader: [
            `css?${sourceMapQueryStr}`,
            'postcss',
            `resolve-url?${sourceMapQueryStr}`,
            `sass?${sourceMapQueryStr}`,
          ],
        }),
      },
      {
        test: /\.(png|jpe?g|gif|svg)$/,
        include: config.paths.assets,
        exclude: path.join(config.paths.assets, 'images/admin'),
        use: [
          `file?${qs.stringify({
            name: `[path]${assetsFilenames}.[ext]`,
          })}`,
        ],
      },
      {
        test: /\.(png|jpe?g|gif|svg)$/,
        include: path.join(config.paths.assets, 'images/admin'),
        use: [
          `file?${qs.stringify({
            name: '[path][name].[ext]',
          })}`,
        ],
      },
      {
        test: /\.(ttf|eot|otf)$/,
        include: config.paths.assets,
        loader: `file?${qs.stringify({
          name: `[path]${assetsFilenames}.[ext]`,
        })}`,
      },
      {
        test: /\.woff2?$/,
        include: config.paths.assets,
        loader: `url?${qs.stringify({
          limit: 10000,
          mimetype: 'application/font-woff',
          name: `[path]${assetsFilenames}.[ext]`,
        })}`,
      },
      {
        test: /\.(ttf|eot|otf|woff2?|png|jpe?g|gif|svg)$/,
        include: /node_modules|bower_components/,
        loader: 'file',
        options: {
          name: `vendor/${config.cacheBusting}.[ext]`,
        },
      },
      {
        test: /modernizr\.js$/,
        use: 'exports?window.Modernizr',
      },
      {
        test: /\.vue$/,
        use: 'vue',
      },
    ],
  },
  resolve: {
    modules: [
      config.paths.assets,
      'node_modules',
      'bower_components',
    ],
    enforceExtension: false,
    alias: {
      vue: config.enabled.optimize ? 'vue/dist/vue.min.js' : 'vue/dist/vue.js',
      'video.js': 'video.js/dist/video.js',
    },
  },
  resolveLoader: {
    moduleExtensions: ['-loader'],
  },
  externals: {
    jquery: 'jQuery',
    'window.jsParams': 'jsParams',
    jsParams: 'jsParams',
    'window.google': 'google',
    google: 'google',
  },
  plugins: [
    new CleanPlugin([config.paths.dist], {
      root: config.paths.root,
      verbose: false,
    }),
    new CopyGlobsPlugin({
      // It would be nice to switch to copy-webpack-plugin, but unfortunately it doesn't
      // provide a reliable way of tracking the before/after file names
      pattern: config.copy,
      output: `[path]${assetsFilenames}.[ext]`,
      manifest: config.manifest,
    }),
    new ExtractTextPlugin({
      filename: `styles/${assetsFilenames}.css`,
      allChunks: false,
      disable: (config.enabled.watcher),
    }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      Tether: 'tether',
      'window.Tether': 'tether',
      'window.jsParams': 'jsParams',
      jsParams: 'jsParams',
      'window.google': 'google',
      google: 'google',
    }),
    new webpack.DefinePlugin({
      WEBPACK_PUBLIC_PATH: (config.enabled.watcher)
        ? JSON.stringify(config.publicPath)
        : false,
    }),
    new webpack.LoaderOptionsPlugin({
      minimize: config.enabled.optimize,
      debug: config.enabled.watcher,
      stats: { colors: true },
    }),
    new webpack.LoaderOptionsPlugin({
      test: /\.s?css$/,
      options: {
        output: { path: config.paths.dist },
        context: config.paths.assets,
        postcss: [
          autoprefixer({ browsers: ['last 2 versions', 'android 4', 'opera 12'] }),
        ],
      },
    }),
    new webpack.LoaderOptionsPlugin({
      test: /\.js$/,
      options: {
        eslint: { failOnWarning: false, failOnError: true },
      },
    }),
  ],
};

/* eslint-disable global-require */ /** Let's only load dependencies as needed */

if (config.enabled.optimize) {
  webpackConfig = mergeWithConcat(webpackConfig, require('./webpack.config.optimize'));
}

if (config.env.production) {
  webpackConfig.plugins.push(new webpack.NoErrorsPlugin());
}

if (config.enabled.cacheBusting) {
  const WebpackAssetsManifest = require('webpack-assets-manifest');

  webpackConfig.plugins.push(
    new WebpackAssetsManifest({
      output: 'assets.json',
      space: 2,
      writeToDisk: false,
      assets: config.manifest,
      replacer: require('./util/assetManifestsFormatter'),
    })
  );
}

if (config.enabled.watcher) {
  webpackConfig.entry = require('./util/addHotMiddleware')(webpackConfig.entry);
  webpackConfig = mergeWithConcat(webpackConfig, require('./webpack.config.watch'));
}

module.exports = webpackConfig;
