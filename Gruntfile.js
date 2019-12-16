'use strict';

module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-css-purge');
  grunt.loadNpmTasks('grunt-contrib-sass');
 
    grunt.initConfig({
        purge: {
            site: {
                options: {},
                src: 'site.css',
                dest: 'site.min.css',
            },
        },
		sass: {
			dist: {
				files: [{
					expand: true,
					cwd: 'styles/scss',
					src: ['**/*.scss'],
					dest: 'styles/css',
					ext: '.css'
				}]
			}
  		}
    });
 
    grunt.registerTask('default', ['purge']);
    grunt.registerTask('sass', ['sass']);
};