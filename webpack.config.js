module.exports = {
    entry: {
        app: './src/ts/app.ts',
        lib: './src/js/lib.js'
    },
    devtool: 'inline-source-map',
    output: {
        path: `${__dirname}/assets/`,
        filename: '[name].js'
    },
    watch: false,
    mode: "production", //ta opcja zostanie pominięta jeżeli użyjemy npm run build
    devtool: "source-map",
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [["env", {
                            targets: {
                                browsers: ['> 1%']
                            }
                        }]]
                    }
                }
            },
            {
                test: /\.tsx?$/,
                use: 'ts-loader'
            }
        ],
    },
    resolve: {
        extensions: [ '.tsx', '.ts', '.js' ]
    },
}