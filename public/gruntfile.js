module.exports = function (grunt) {

    grunt.initConfig({

        // cssmin: {
        //   options: {
        // 	shorthandCompacting: false,
        // 	roundingPrecision: -1
        //   },
        //   target: {
        // 	files: {
        // 	  'output.css':  ['bar.css', 'foo.css']
        // 	}
        //   }
        // },

        concat: {
            options: {
                separator: ';'
            },
            jspc: {
                src: [ 'jspc/vendor/bootstrap.min.js', 'jspc/owl.carousel.min.js', 'jspc/jquery.idTabs.min.js', 'jspc/jquery.rateyo.min.js','jspc/jquery.matchHeight.js', 'jspc/vendor/modernizr-2.8.3-respond-1.4.2.min.js', 'jspc/main.js'],
                dest: 'jspc/built.js'
            },
            csspc: {
                src: [ 'csspc/bootstrap.min.css', 'csspc/bootstrap-theme.min.css', 'csspc/owl.carousel.min.css', 'csspc/jquery.rateyo.css', 'csspc/main.css', 'csspc/pikaday.css'],
                dest: 'csspc/built.css'
            },
            jsmobile:{
                src: ['js/storage/cache.js', 'js/storage/common.js', 'js/ecomedic.js', 'js/main.js'],
                dest: 'js/built.js'
            },
            cssmobile:{
                src: ['css/ecomedic.css', 'css/icheck/square/_all.css', 'css/icheck/all.css', 'css/main.css'],
                dest: 'css/built.css'
            }

        },

        cssmin: {
            //pc: {
            //    files: [{
            //        expand: true,
            //        cwd: 'csspc',
            //        src: ['*.css', '!*.min.css'],
            //        dest: 'csspcmin',
            //        ext: '.min.css'
            //    }]
            //},
            //mobile: {
            //    files: [{
            //        expand: true,
            //        cwd: 'css',
            //        src: ['*.css', '!*.min.css'],
            //        dest: 'cssmin',
            //        ext: '.min.css'
            //    }]
            //},
            pcbuild: {
                files: {
                    'csspc/built.min.css': [ 'csspc/bootstrap.min.css', 'csspc/bootstrap-theme.min.css', 'csspc/owl.carousel.min.css', 'csspc/jquery.rateyo.css', 'csspc/main.css', 'csspc/pikaday.css']
                }
            },
            mobilebuild: {
                files: {
                    'css/built.min.css': ['css/ecomedic.css', 'css/icheck/all.css', 'css/main.css']
                }
            }

        },


        // Project configuration.
        //   uglify: {
        // 	my_target: {
        // 	  files: {
        // 		'output.min.js': ['main.js']
        // 	  }
        // 	}
        //   },

        // uglify: {
        //   build: {
        // 	  files: [{
        // 		  expand: true,
        // 		  cwd: 'js',
        // 		  src: '*.js',
        // 		  dest: 'jsmin',
        // 		  ext: '.min.js'
        // 	  }]
        //   }
        // },


        uglify: {
            pc: {
                files: [{
                    expand: true,
                    cwd: 'jspc',
                    src: '**/*.js',
                    dest: 'jspcmin/',
                    ext: '.min.js'
                }]
            },
            mobile: {
                files: [{
                    expand: true,
                    cwd: 'js',
                    src: '**/*.js',
                    dest: 'jsmin/',
                    ext: '.min.js'
                }]
            }
        },


        htmlmin: {                                     // Task
            dist: {                                      // Target
                options: {                                 // Target options
                    removeComments: true,
                    collapseWhitespace: true
                },
                files: {                                   // Dictionary of files
                    'dist/index.html': 'src/index.html'     // 'destination': 'source'
                }
            }
        },

        imagemin: {                          // Task
            static: {                          // Target
                options: {                       // Target options
                    optimizationLevel: 7
                },
                files: {                         // Dictionary of files
                    'las.jpg': 'las2.jpg', // 'destination': 'source'

                }
            },
            dynamic: {                         // Another target
                files: [{
                    expand: true,                  // Enable dynamic expansion
                    cwd: 'src/',                   // Src matches are relative to this path
                    src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
                    dest: 'dist/'                  // Destination path prefix
                }]
            }
        },

        jshint: {
            all: ['Gruntfile.js', 'src/*.js', 'dist/*.js']
        },

        watch: {
            scripts: {
                files: ['*.css'],
                tasks: ['cssmin'],
                options: {
                    spawn: false,
                    //debounceDelay: 250,
                },
            },
        },

    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-htmlmin');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');

    grunt.registerTask('mincss', ['cssmin']);
    grunt.registerTask('minjs', ['uglify']);
    grunt.registerTask('merge', ['concat']);
    grunt.registerTask('build', ['concat']);

    grunt.registerTask('default', ['mincss']);

};
