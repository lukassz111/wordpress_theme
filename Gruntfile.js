module.exports = function(grunt) {

  grunt.initConfig({
    config: {
        srcDir: "src/",
        libDir: 'node_modules/',
        debug: false
    },
    watch: {
      files: ['<%= config.srcDir %>/scss/**/*.scss'],
      tasks: ['build']
    },
    sass: {
        dist: {
            sourceMap: '<%= config.debug %>',
            files: {
                'main.css': '<%= config.srcDir %>/scss/style.scss'
            }
        }
    },
    copy: {
        dist: {
            files: [
                {// Copy js libs
                    expand: true,
                    cwd: '<%= config.libDir %>',
                    src: [
                        'bootstrap/dist/js/bootstrap.min.js',
                        'popper.js/dist/umd/popper.min.js',
                        'jquery/dist/jquery.min.js'
                    ],
                    dest: 'lib/js/',
                    flatten: true,
                    filter: 'isFile'
                }
            ],
        },
    },
  });

  
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sassjs');
  grunt.loadNpmTasks('grunt-contrib-copy');

  grunt.registerTask('build', ['sass']);
  grunt.registerTask('lib',['copy']);
  grunt.registerTask('default', ['watch']);

};