const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const StyleLintPlugin = require('stylelint-webpack-plugin')
const postcssMixins = require('postcss-mixins')
const postcssPresetEnv = require('postcss-preset-env')
const devMode = process.env.NODE_ENV !== 'production'
const CopyWebpackPlugin = require('copy-webpack-plugin');
module.exports = {
  entry: {
		frontend: path.resolve(process.cwd(), './src/frontend.js'),
		login: path.resolve(process.cwd(), './src/login.js')
  },
  output: {
    path: path.resolve(__dirname, 'assets'),
    filename: !devMode ? './js/[name].min.js' : './js/[name].js',
		clean: true
  },
  watch: devMode,
  devtool: 'eval-cheap-source-map',
	resolve: {
    alias: {
      lib: path.resolve(process.cwd(), './src/js/lib/'),
      blocks: path.resolve(process.cwd(), './src/js/blocks/')
    },
    extensions: ['.js', '.jsx']
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /(node_modules|bower_components)/,
        resolve: {
          extensions: ['.js', '.jsx']
        },
        use: {
          loader: 'babel-loader'
        }
      },
      {
        test: /\.(p|c)ss$/,
        use: [
          devMode ? 'style-loader' : MiniCssExtractPlugin.loader,
          devMode
            ? {
                loader: 'css-loader',
                options: {
                  sourceMap: true
                }
              }
            : 'css-loader',
          {
            loader: 'postcss-loader',
            options: {
              postcssOptions: {
                plugins: [
                  require('autoprefixer'),
                  require('postcss-import'),
									postcssMixins({
										mixinsDir: path.join(__dirname, 'src/postcss/mixins')
									}),
                  postcssPresetEnv({
										importFrom: path.join(__dirname, 'src/postcss/variables.css'),
										exportTo: 'variables.css',
                    stage: 1,
                    features: {
                      'custom-media-queries': true,
                      'nesting-rules': true
                    }
                  })
                ]
              }
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: devMode ? './css/[name].css' : './css/[name].min.css'
    }),
    // Lint CSS.
    new StyleLintPlugin({
			context: path.resolve(process.cwd(), './src/postcss/'),
			files: '**/*.css'
		}),

    new CopyWebpackPlugin({
			patterns: [
				{
					from: '**/img/*.{png,jpg}',
					to: '[path][name][ext]',
					context: path.resolve(process.cwd(), 'src/'),
				},
			],
		}),
    
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3000,
      watch: true,
      proxy: {
        target: 'http://saticus.test/',
        proxyReq: [
          proxyReq => {
            proxyReq.setHeader(
              'X-Cyno-Theme-Header',
              process.env.NODE_ENV
            )
          }
        ]
      }
    })
  ],
  externals: {
    jQuery: 'jQuery'
  }
}