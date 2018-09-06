const webpackConfig = require('./webpack.config');

module.exports = function(grunt) {

  grunt.initConfig({
    config: {
        srcDir: "src/",
        libDir: 'node_modules/',
        assetsDir: "assets/"
    },
    watch: {
      files: [
          '<%= config.srcDir %>/scss/**/*.scss',
          '<%= config.srcDir %>/js/**/*.js'
        ],
      tasks: ['dev']
    },
    sass: {
        prod: {
            sourceMap: false,
            files: {
                '<%= config.assetsDir %>/bundle.css': '<%= config.srcDir %>/scss/style.scss'
            }
        },
        dev: {
            sourceMap: true,
            files: {
                '<%= config.assetsDir %>/bundle.css': '<%= config.srcDir %>/scss/style.scss'
            }
        }
    },
    webpack: {
        prod: webpackConfig,
        dev: Object.assign({ mode: 'development' }, webpackConfig)
    }
  });

  
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sassjs');
  grunt.loadNpmTasks('grunt-webpack');

  grunt.registerTask('build', ['sass:prod','webpack:prod']);
  grunt.registerTask('dev',['sass:dev','webpack:dev']);

  grunt.registerTask('default', ['dev','watch']);

};