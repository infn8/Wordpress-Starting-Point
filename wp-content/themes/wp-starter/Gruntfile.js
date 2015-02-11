module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


    compass: {
        dist: {
          options: {
            config: 'config.rb'
          }
        }
      },
      watch: {
        css: {
          files: '**/*.scss',
          tasks: ['compass']
        },
        php:{
          files: '**/*.php',
        },
        js:{
          files: '**/*.js',
        },
        options: {
          // Start a live reload server on the default port 35729
          livereload: true,
        }
      }

  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compass');

  // Default task(s).
  grunt.registerTask('default', ['watch']);

};