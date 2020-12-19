module.exports = {
    input: './src/app.js',
    output: './dist/app.bundle.js',
    namespace: 'Kidrest.Components',
    adjustConfigPhp: false,
    plugins: {
        resolve: true,
    }
};