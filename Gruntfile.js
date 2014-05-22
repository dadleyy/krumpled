module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-coffee');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');

  var vendor_js = [
    'bower_components/angular/angular.js',
    'bower_components/angular-route/angular-route.js'
  ];

  grunt.initConfig({

    watch: {
      sass: {
        files: ['assets/sass/**/*.sass'],
        tasks: ['sass']
      }
    },

    sass: {
      build: {
        options: {
          loadPath: require('node-neat').includePaths
        },
        files: {
          'public/css/app.css': 'assets/sass/app.sass'
        }
      }
    },

    coffee: {
      build: {
        options: {
          join: true
        },
        files: {
          'obj/js/app.js': ['assets/coffee/module.coffee', 'assets/coffee/**/*.coffee']
        }
      }
    },

    concat: {
      build: {
        options: {
          separator: ';'
        },
        src: vendor_js.concat('obj/js/app.js'),
        dest: 'public/js/app.js'
      }
    }

  });

  grunt.registerTask('default', ['sass', 'coffee', 'concat']);

};
