module.exports = function(grunt) {

  const sass = require('node-sass'),
        cssnano = require('cssnano');

  grunt.initConfig({
    sass: {
      options: {
        implementation: sass,
        sourceMap: true
      },
      build: {
        options: {
          outputStyle: 'expanded'
        },
        files: {
          'style.css': 'sass/main.scss',
          'css/admin-style.css': 'sass/wordpress/main.scss',
          'css/vklogin-style.css': 'sass/wordpress-login/main.scss'
        }
      }
    },
    postcss: {
      autoprefix: {
        options: {
          processors: [
            require('autoprefixer')()
          ],
          map: {
            inline: false
          }
        },
        files: {
          'style.css': 'style.css',
          'css/admin-style.css': 'css/admin-style.css',
          'css/vklogin-style.css': 'css/vklogin-style.css'
        }
      },
      compressed: {
        options: {
          processors: [
            cssnano()
          ],
          map: {
            inline: false,
            annotation: 'css/'
          }
        },
        files: {
          'css/admin-style.min.css': 'css/admin-style.css',
          'css/vklogin-style.min.css': 'css/vklogin-style.css'
        }
      }
    },
    browserify: {
      options: {
        browserifyOptions: {
          extensions: ['.jsx', '.js']
        },
        transform: [
          [
            'babelify',
            {
              presets: ['@babel/env', '@babel/preset-react'],
              compact: true
            }
          ]
        ]
      },
      build: {
        files: {
          'js/bundle/app.bundle.js': 'js/source/app.js',
          'js/bundle/admin.bundle.js': 'js/source/admin.js',
          'js/bundle/vklogin.bundle.js': 'js/source/vklogin.js'
        }
      }
    },
    uglify: {
      build: {
        files: {
          'js/vklogin.bundle.min.js': 'js/bundle/vklogin.bundle.js'
        }
      }
    },
    watch: {
      options: {
        livereload: true
      },
      php: {
        files: ['*.php', '**/*.php']
      },
      sass: {
        files: ['sass/**'],
        tasks: ['styles']
      },
      js: {
        files: ['js/**/*.js', '!js/bundle/**', '!js/vendor/*.min.js', '!js/*.min.js'],
        tasks: ['scripts']
      },
      jsx: {
        files: ['js/**/*.jsx'],
        tasks: ['scripts']
      }
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-browserify');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Register global tasks
  grunt.registerTask('default', ['styles', 'scripts', 'launch']);

  // Register custom tasks
  grunt.registerTask('styles', ['sass:build', 'postcss:autoprefix']);
  grunt.registerTask('scripts', ['browserify:build', 'uglify:build']);
  grunt.registerTask('launch', ['watch']);
};