/* eslint-disable */
// External dependencies
const webpack = require('webpack');
const path = require('path');
const argv = require('minimist')(process.argv.slice(2));
const qs = require('qs');
const autoprefixer = require('autoprefixer');
const Clean = require('clean-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const cssnano = require('cssnano');
const NpmInstallPlugin = require('npm-install-webpack-plugin');
const AssetsPlugin = require('assets-webpack-plugin');

// Internal dependencies
const config = require('./config');

const assetsFilenames = (config.enabled.cacheBusting) ? config.cacheBusting : '[name]';
const sourceMapQueryStr = (config.enabled.sourceMaps) ? '+sourceMap' : '-sourceMap';
const processOutput = require('./util/assetsPluginProcessOutput');
const addHotMiddleware = require('./util/addHotMiddleware');

const jsLoader = {
  test: /\.js$/,
  exclude: /(node_modules|bower_components)/,
  include: config.paths.assets,
  loaders: ['babel?presets[]=es2015&cacheDirectory'],
};

if (argv.watch) { // '--watch' to add monkey-hot
  jsLoader.loaders.unshift('monkey-hot');
}

const webpackConfig = {
  context: config.paths.assets,
  entry: config.entry,
  output: {
    path: config.paths.dist,
    publicPath: config.publicPath,
    filename: `scripts/${assetsFilenames}.js`,
  },
  module: {
    noParse: [
      /node_modules[\\/]video\.js/,
    ],
    preLoaders: [
      {
        test: /\.js?$/,
        exclude: /(node_modules|bower_components|modernizr.js)/,
        loader: 'eslint',
      },
    ],
    loaders: [
      jsLoader,
      {
        test: /\.css$/,
        include: config.paths.assets,
        loader: ExtractTextPlugin.extract('style', [
          `css?${sourceMapQueryStr}`,
          'postcss',
        ]),
      },
      {
        test: /\.scss$/,
        include: config.paths.assets,
        loader: ExtractTextPlugin.extract('style', [
          `css?${sourceMapQueryStr}`,
          'postcss',
          `resolve-url?${sourceMapQueryStr}`,
          `sass?${sourceMapQueryStr}`,
        ]),
      },
      {
        test: /\.(png|jpg|jpeg|gif)(\?.*)?$/,
        include: config.paths.assets,
        loaders: [
          `file?${qs.stringify({
            name: '[path][name].[ext]',
          })}`,
          `image-webpack?${JSON.stringify({
            bypassOnDebug: true,
            progressive: true,
            optimizationLevel: 7,
            interlaced: true,
            pngquant: {
              quality: '65-90',
              speed: 4,
            },
            svgo: {
              removeUnknownsAndDefaults: false,
              cleanupIDs: false,
            },
          })}`,
        ],
      },
      {
        test: /\.(ttf|eot|svg|otf)(\?.*)?$/,
        include: config.paths.assets,
        exclude: path.join(config.paths.assets, 'images'),
        loader: `file?${qs.stringify({
          name: `[path]${assetsFilenames}.[ext]`,
        })}`,
      },
      {
        test: /\.svg(\?.*)?$/,
        include: path.join(config.paths.assets, 'images'),
        loader: `file?${qs.stringify({
          name: '[path][name].[ext]',
        })}`,
      },
      {
        test: /\.woff(2)?(\?.*)?$/,
        include: config.paths.assets,
        loader: `url?${qs.stringify({
          limit: 10000,
          mimetype: 'application/font-woff',
          name: `[path]${assetsFilenames}.[ext]`,
        })}`,
      },
      {
        test: /\.(ttf|eot|otf|woff2?|png|jpe?g|gif|svg)(\?.*)?$/,
        include: /node_modules|bower_components/,
        loader: `file?${qs.stringify({
          name: `vendor/${config.cacheBusting}.[ext]`,
        })}`,
      },
      {
        test: /modernizr\.js$/,
        include: config.paths.assets,
        loader: 'imports?this=>window!exports?window.Modernizr',
      },
      {
        test: /\.vue$/,
        include: config.paths.assets,
        loader: 'vue',
      },
    ],
  },
  resolve: {
    extensions: ['', '.js', '.json'],
    root: config.paths.assets,
    moduleDirectories: [
      'node_modules',
      'bower_components',
    ],
    unsafeCache: true,
    alias: {
      vue: argv.release ? 'vue/dist/vue.min.js' : 'vue/dist/vue.js',
      'video.js': 'video.js/dist/video.js',
    },
  },
  externals: {
    $: 'jquery',
    jQuery: 'jquery',
    'window.jQuery': 'jquery',
    Tether: 'tether',
    'window.Tether': 'tether',
    jsParams: 'jsParams',
    'window.jsParams': 'jsParams',
    google: 'google',
  },
  plugins: [
    new Clean([config.paths.dist], config.paths.root),
    new ExtractTextPlugin(
      `styles/${assetsFilenames}.css`, {
        allChunks: true,
        disable: (argv.watch === true), // '--watch' disable ExtractTextPlugin
      }),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      Tether: 'tether',
      'window.Tether': 'tether',
      jsParams: 'jsParams',
      'window.jsParams': 'jsParams',
      google: 'google',
    }),
    new NpmInstallPlugin(),
    new webpack.DefinePlugin({
      WEBPACK_PUBLIC_PATH: JSON.stringify(config.publicPath),
    }),
  ],
  postcss: [
    autoprefixer({
      browsers: [
        'last 2 versions',
        'android 4',
        'opera 12',
      ],
    }),
  ],
  eslint: {
    failOnWarning: false,
    failOnError: true,
  },
  stats: {
    colors: true,
  },
};

// '--watch' to push additional plugins to webpackConfig
if (argv.watch) {
  webpackConfig.entry = addHotMiddleware(webpackConfig.entry);
  webpackConfig.output.pathinfo = true;
  webpackConfig.debug = true;
  webpackConfig.devtool = '#cheap-module-source-map';
  webpackConfig.plugins.push(new webpack.optimize.OccurenceOrderPlugin());
  webpackConfig.plugins.push(new webpack.HotModuleReplacementPlugin());
  webpackConfig.plugins.push(new webpack.NoErrorsPlugin());
}

// '--release' to push additional plugins to webpackConfig
if (argv.release) {
  webpackConfig.plugins.push(new AssetsPlugin({
    path: config.paths.dist,
    filename: 'assets.json',
    fullPath: false,
    processOutput,
  }));
  webpackConfig.plugins.push(new webpack.DefinePlugin({
    'process.env': {
      NODE_ENV: '"production"',
    },
  }));
  webpackConfig.plugins.push(new webpack.optimize.UglifyJsPlugin({
    compress: {
      drop_debugger: true,
    },
  }));
  webpackConfig.plugins.push(new OptimizeCssAssetsPlugin({
    cssProcessor: cssnano,
    cssProcessorOptions: { discardComments: { removeAll: true } },
    canPrint: true,
  }));
}

module.exports = webpackConfig;
