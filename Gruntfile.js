module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json')
   });

jshint: {
  files: ['Gruntfile.js', 'controllers/**/*.js', 'test/**/*.js'],
  options: {
    globals: {
      jQuery: true,
      console: true,
      module: true
    }
  }
}

grunt.loadNpmTasks('grunt-contrib-jshint');

grunt.registerTask('lint', ['jshint', '']);
grunt.registerTask('default', ['jshint', '', 'concat', 'uglify']);

};
