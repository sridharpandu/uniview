module.exports = function(config) {
    config.set({
        //  root path location that will be used to resolve all relative paths in files and exclude sections, should be the root of your project
        basePath: '',

        // files to include, ordered by dependencies
        files: [
            // include relevant Angular files and libs
           // "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js",
            "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js",
	   // "https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js",
            "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-mocks.js",
           // "http://code.jquery.com/jquery-1.11.0.min.js",
            //"assets/global/plugins/angularjs/plugins/*.js",
            //"assets/global/plugins/bootstrap/js/bootstrap.min.js",
            //"assets/global/plugins/angularjs/angular-sanitize.min.js",

            // include js files
            '../../js/main.js',
            '../../js/controllers/*.js',

            // include unit test specs
            '*.js'
        ],
        // files to exclude

        exclude: [
            // "assets/global/plugins/angularjs/plugins/angular-ui-router.min.js",
            // "assets/global/plugins/angularjs/plugins/ocLazyLoad.min.js",
            // "assets/global/plugins/angularjs/plugins/ui-bootstrap-tpls.min.js",
            // "assets/global/plugins/bootstrap/js/bootstrap.min.js",
            // 'test/loginTest.js'
            '../../js/controllers/existingbankdetController.js',
        ],


        // karma has its own autoWatch feature but Grunt watch can also do this
        autoWatch: true,
        colors: true,

        // testing framework, be sure to install the karma plugin
        frameworks: ['jasmine'],

        // browsers to test against, be sure to install the correct karma browser launcher plugin
        // browsers: ['Chrome', 'Firefox'],
        browsers: ['ChromeHeadless'],

        customLaunchers: {
            ChromeHeadless: {
                base: 'Chrome',
                flags: [
                    '--disable-gpu',
                    '--headless',
                    '--no-sandbox',
                    '--remote-debugging-port=9222',
                ],
            },
        },

        // progress is the default reporter
       // reporters: ['progress'],



        // map of preprocessors that is used mostly for plugins
        preprocessors: {

        },

        // list of karma plugins
        plugins: [
           // 'karma-junit-reporter',
            'karma-chrome-launcher',
            //'karma-firefox-launcher',
            'karma-jasmine',
            // 'karma-phantomjs-launcher'
        ]
    })
}
