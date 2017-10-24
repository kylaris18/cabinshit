'use strict';

var grunt = require('grunt'),
    path  = require('path'),
    exec  = require('child_process').exec,
    execOptions = {
      cwd: path.join(__dirname, '..')
    };

/*
  ======== A Handy Little Nodeunit Reference ========
  https://github.com/caolan/nodeunit

  Test methods:
    test.expect(numAssertions)
    test.done()
  Test assertions:
    test.ok(value, [message])
    test.equal(actual, expected, [message])
    test.notEqual(actual, expected, [message])
    test.deepEqual(actual, expected, [message])
    test.notDeepEqual(actual, expected, [message])
    test.strictEqual(actual, expected, [message])
    test.notStrictEqual(actual, expected, [message])
    test.throws(block, [error], [message])
    test.doesNotThrow(block, [error], [message])
    test.ifError(value)
*/

exports.git_reset = {
  setUp: function(done) {
    done();
  },
  bad_options: function(test) {
    test.expect(1);

    test.throws(
      exec('grunt git_reset:bad_options', execOptions),
      Error,
      'Running git_reset without path setting throws an error'
    );

    test.done();
  },
  good_options: function(test) {
    var file_exists,
        file_contents;

    test.expect(4);

    // delete file
    grunt.file.delete('test/fixtures/delete_this_file');
    file_exists = grunt.file.exists('test/fixtures/delete_this_file');
    test.ok(!file_exists, 'file is deleted to start out');

    // edit file
    grunt.file.write('test/fixtures/edit_this_file', 'changed');
    file_contents = grunt.file.read('test/fixtures/edit_this_file');
    test.equal(file_contents, 'changed', 'file is changed');

    exec('grunt git_reset:good_options', execOptions, function(error, stdout) {
      file_exists = grunt.file.exists('test/fixtures/delete_this_file');
      test.ok(file_exists, 'deleted file restored');

      file_contents = grunt.file.read('test/fixtures/edit_this_file');
      test.equal(file_contents, 'unchanged', 'file is unchanged');

      test.done();
    });
  }
};
