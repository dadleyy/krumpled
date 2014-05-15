module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-contrib-sass');

  grunt.initConfig({

    sass: {
      build: {
        options: {
          loadPath: require('node-neat').includePaths
        },
        files: {
          'public/css/app.css': 'assets/sass/app.sass'
        }
      }
    }

  });

  grunt.registerTask('default', []);

};
