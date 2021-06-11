const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const CopyPlugin = require('copy-webpack-plugin');

const config = {
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /node_modules/
      },
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
              sourceMap: true,
              url: false
            }
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
            }
          },
        ]
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
              sourceMap: true,
              url: false
            }
          },
          {
            loader: 'postcss-loader',
            options: {
              sourceMap: true,
            }
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
            }
          },
        ]
      }
    ]
  }
};

module.exports = (env, argv) => {

  if (argv.mode === 'development') {
    config.devtool = 'source-map';
    config.plugins = [
      new MiniCssExtractPlugin(),
      new webpack.SourceMapDevToolPlugin({}),
      new CopyPlugin({
        patterns: [
          { from: './node_modules/bulma-scss', to: '../sass/bulma-scss' },
          { from: './node_modules/hamburgers/_sass/hamburgers', to: '../sass/hamburgers' },
          { from: './src/images', to: './src/images' },
        ],
      }),      
    ]
  }

  if (argv.mode === 'production') {
    config.plugins = [
      new MiniCssExtractPlugin(),
      new CopyPlugin({
        patterns: [
          { from: './node_modules/bulma-scss', to: '../sass/bulma-scss' },
          { from: './node_modules/hamburgers/_sass/hamburgers', to: '../sass/hamburgers' },
          { from: './src/images', to: './src/images' },
        ],
      }),
    ]
  }

  return config;
};