var path = require('path');
var webpack = require('webpack');

module.exports = {
    // メインとなるJavaScriptファイル（エントリーポイント）
    entry: `./src/index.js`,
  
    // ファイルの出力設定
    output: {
      //  出力ファイルのディレクトリ名
      path: `${__dirname}/dist`,
      // 出力ファイル名
      filename: "bundle.js"
    },
    module: {
        loaders: [
          {
            test: /.jsx?$/,
            loader: 'babel-loader',
            exclude: /node_modules/,
            query: {
              presets: ['es2015'],
            },
          },
        ],
    },
    mode: "development"
  };