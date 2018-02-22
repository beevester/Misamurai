requirejs.config({
    baseUrl: 'js/',
    paths: {
        Vue: "lib/vue/dist/vue.min",
        Vuejs: "lib/requirejs-vue/requirejs-vue",
        jquery: "lib/jquery-3.3.1.min",
        bootstrap: "lib/bootstrap.min",
        react: "lib/react.production.min.js",
        reactdom: "lib/react-dom.production.min.js",
        underscore: "lib/underscore-min.js",
        backbone: "lib/backbone-min.js",   
    },
    shim: {
        Vue: {
            exports: "Vue"
    },
    config: {
        'vue': {
            'pug': 'browser-pug',
            'css': 'inject',
            'templateVar': 'template'
        }
    }
}
});

// load the vue main js
require(['Vue', 'Vuejs!component'], function (component) {
	
});
