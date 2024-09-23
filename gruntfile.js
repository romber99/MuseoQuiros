/* =======================
// GRUNT TASKS CHEATSHEET
// =======================
grunt                       // Compiles theme with distribution settings
grunt default               // Same as above

grunt deploy                // Runs default task and deploys theme via SFTP

grunt dev                   // Compiles theme with development settings
grunt dev-watch             // Runs dev task and watch for changes to recompile theme

newpart:path/to/part        // Last part of the path must be the part name. Use with caution */

module.exports = function(grunt) {
    grunt.initConfig({
        config: grunt.file.readJSON('config.json'),
        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    quiet: true,
                },
                files: {
                    '<%= config.dist_folder %>/style.css': '_src/style.scss' // target <- source
                }
            },
            dist: {
                options: {
                    style: 'compressed',
                    quiet: true,
                },
                files: {
                    '<%= config.dist_folder %>/style.css': '_src/style.scss' // target <- source
                }
            }
        },
        uglify: {
            dist: {
                options: {
                    mangle: false,
                    banner: "/* Compressed scripts */",
                    output: {
                        comments: false
                    }
                },
                files: [{
                    cwd: '_src/',
                    src: ['scripts/**/*.js'],
                    dest: '<%= config.dist_folder %>/',
                    expand: true
                }]
            }
        },   
        copy: {  
            libs: {
                files: [
                {
                    cwd: 'node_modules/swiper/',                                                         // node_modules lib folder
                    src: ['swiper-bundle.min.css','swiper-bundle.min.js', 'swiper-bundle.min.js.map'],   // files to copy
                    dest: '<%= config.dist_folder %>/assets/swiper/',                                    // destination in distributed theme
                    expand: true
                },
                /* {
                    cwd: 'node_modules/lucide/dist/umd/',
                    src: ['lucide.min.js','lucide.min.js.map'],
                    dest: '<%= config.dist_folder %>/assets/lucide-icons/',
                    expand: true
                } */
                {
                    cwd: 'node_modules/@tabler/icons-webfont',
                    src: ['tabler-icons.min.css','tabler-icons.min.css.map','fonts/*'],
                    dest: '<%= config.dist_folder %>/assets/tabler-icons/',
                    expand: true
                }]
            },
            php: {
                files: [{
                    cwd: '_src/',                           // root
                    src: ['**/*.php'],                      // files to copy
                    dest: '<%= config.dist_folder %>/',                // destination
                    expand: true                            // required when using cwd
                }]
            },
            js: {
                files: [{
                    cwd: '_src/',
                    src: ['scripts/**/*.js'],
                    dest: '<%= config.dist_folder %>/',
                    expand: true
                }]
            },
            assets: {
                files: [{
                    cwd: '_src/',
                    src: ['assets/**/*'],
                    dest: '<%= config.dist_folder %>/',
                    expand: true
                }]
            },
            themeimg: {
                files: [{
                    cwd: '_src/',
                    src: ['screenshot.png'],
                    dest: '<%= config.dist_folder %>/',
                    expand: true
                }]
            }
        },
        watch: {
            local: {
                files: ['_src/*.scss', '_src/**/*.scss', '_src/*.php', '_src/**/*.php', '_src/**/*.js'],
                tasks: ['sass:dev', 'copy:php', 'copy:js']
            },
            ftp: {
                files: ['_src/*.scss', '_src/**/*.scss', '_src/*.php', '_src/**/*.php', '_src/**/*.js'],
                tasks: ['sass:dev', 'copy:libs', 'copy:php', 'copy:assets', 'sftp-deploy:dist']
            }
        },
        newpart: {
            options: {
                template_folder: '_src/template-parts',
                add_to_scss: true
            }
        },
        'sftp-deploy': {
            dist: {
                auth:{
                    host:'<%= config.ftp_host %>',
                    port: '<%= config.ftp_port %>',
                    authKey: '<%= config.ftp_authKey %>'
                },
                src: '<%= config.dist_folder %>',
                dest: '<%= config.ftp_dest %>',
                /* exclusions: 
                    ['dist/futura-theme/theme-config/end-points.php',
                    'dist/futura-theme/theme-config/general_functions_end_points.php',
                    'dist/futura-theme/theme-config/encryption_QR.php',
                    'dist/futura-theme/functions.php',
                    'dist/futura-theme/scripts/appointment-edit-url.js',
                    'dist/futura-theme/scripts/qr-show.js',
                    'dist/futura-theme/scripts/QR_reader.js',
                    'dist/futura-theme/scripts/penalty.js'], */    
                localSep: '\\',
                progress: true
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-sftp-deploy');

    grunt.registerTask('default', ['sass:dist', 'copy:libs', 'copy:php', 'uglify',  /* 'copy:js', */ 'copy:assets', 'copy:themeimg']);  // uglify already copies js files to destination
    grunt.registerTask('deploy', ['default', 'sftp-deploy:dist']);

    grunt.registerTask('dev', ['sass:dev', 'copy:libs', 'copy:php', 'copy:js', 'copy:assets', 'copy:themeimg']);
    grunt.registerTask('dev-watch', ['dev', 'watch:local']);

    grunt.registerTask('newpart', "Create a new template part", function(path) {
        var dest = grunt.config.get('newpart.options.template_folder');

        var path_parts = path.split('/');
        var path_len = path_parts.length;
        var current_path = "";

        for (var i = 0; i < path_len-1; i++) {
            if (i != 0) current_path += "/";
            current_path += path_parts[i];

            var scss_path = dest + "/" + current_path + "/_" + path_parts[i] + ".scss";
            var output = "";
            if (grunt.file.exists(scss_path)) {
                output = grunt.file.read(scss_path) + "\n@import '" + path_parts[i+1] + "/" + path_parts[i+1] + "';";
            } else {
                output = "@import '" + path_parts[i+1] + "/" + path_parts[i+1] + "';";
            }
            grunt.file.write(scss_path, output);
        }

        if (path_len == 1) {
            // Must be added to root _template-parts.scss
            var scss_path = dest + "/" + "_template-parts.scss";
            var output = "";
            if (grunt.file.exists(scss_path)) {
                output = grunt.file.read(scss_path) + "\n@import '" + path + "/" + path + "';";
            } else {
                output = "@import '" + path + "/" + path + "';";
            }
            grunt.file.write(scss_path, output);
        }

        grunt.file.write(dest + "/" + path + "/" + path_parts.slice(-1) + ".php");
        grunt.file.write(dest + "/" + path + "/" + path_parts.slice(-1) + ".scss");

        /* var scss_path = dest + "/" + path + "/_" + path + ".scss";
        var output = "";
        if (grunt.file.exists(scss_path)) {
            output = grunt.file.read(scss_path) + "\n@import '" + name + "';";
        } else {
            output = "@import '" + name + "';";
        } */
    });
};