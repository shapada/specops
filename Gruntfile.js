'use strict';

module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');


    grunt.initConfig({
      sass: {
        dist: {
          options: {
            style: 'expanded'
          },
          files: {
            'styles/css/main-style.css': 'styles/scss/main.scss'
          }
        }
      },
      watch: {
        files:  [ 'styles/scss/**/*.scss', '**/*.php' ],
        tasks: ['sass'],
        options: {
          livereload: true
        }
      }
    });
 
  grunt.registerTask( 'default', ['watch' ] );
};