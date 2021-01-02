const path = require('path');

module.exports = {
    output: { 
        chunkFilename: 'js/chunks/[name].js?id=[chunkhash]',
        publicPath: '/',
    },
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};
