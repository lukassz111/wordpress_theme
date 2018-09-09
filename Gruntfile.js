const webpackConfig = require('./webpack.config');

module.exports = function(grunt) {

  grunt.initConfig({
    config: {
        srcDir: "src/",
        libDir: 'node_modules/',
        assetsDir: "assets/"
    },
    watch: {
        options: {
            livereload: true,
        },
        js: {
          files: ['<%= config.srcDir %>/js/**/*.js'],
          tasks: ['webpack:dev','notify:webpack']
        },
        scss: {
          files: ['<%= config.srcDir %>/scss/**/*.scss'],
          tasks: ['sass:dev','notify:sass']
        },
        php:{
            files: ['**/*.php'],
        }
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
    },
    notify: {
        options: {
          enabled: true,
          max_jshint_notifications: 5, // maximum number of notifications from jshint output
          success: true, // whether successful grunt executions should be notified automatically
          duration: 3 // the duration of notification in seconds, for `notify-send only
        },
        webpack: {
            options: {
                title: 'Task Complete',  // optional
                message: 'Webpack finished running', //required
            }
        },
        sass: {
            options: {
                title: 'Task Complete',  // optional    
                message: 'SASS finished running', //required
            }
        },
      }
  });

  
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sassjs');
  grunt.loadNpmTasks('grunt-webpack');
  grunt.loadNpmTasks('grunt-notify');

  grunt.registerTask('build', ['sass:prod','webpack:prod']);
  grunt.registerTask('dev',['sass:dev','webpack:dev']);

  grunt.registerTask('default', ['watch']);

};