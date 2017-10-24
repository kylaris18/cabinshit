/*
 * grunt-git-reset
 * https://github.com/zachwolf/grunt-git-reset
 *
 * Copyright (c) 2014 Zach Wolf
 * Licensed under the MIT license.
 */

'use strict';

var spawn = require('child_process').spawn,
    checkout,
    errorMessage;

module.exports = function(grunt) {

  grunt.registerMultiTask('git_reset', 'Grunt task to reset directory in a git project', function() {
    var options,
        done;

    // Merge task-specific and/or target-specific options with these defaults.
    options = this.options({});

    done = this.async();

    if (!options.path) {
      errorMessage  = '`path` setting is required to prevent \n' +
                      'unwanted lose of changes. If you want to \n' +
                      'reset changes from the root, use `path: \'.\'`\n';
      throw new Error(errorMessage);
    }

    checkout = spawn('git', ['checkout', '--', options.path]);

    checkout.stdout.on('data', function (data) {
      grunt.log.writeln('stdout: ' + data);
      done();
    });

  });

};
