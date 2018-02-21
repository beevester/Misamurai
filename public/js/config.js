requirejs.config({
    baseUrl: 'js/',
    paths: {
        Vue: "lib/vue.min",
        jquery: "lib/jquery-3.3.1.min",
        bootstrap: "lib/bootstrap.min",
        Vue: "lib/require-vuejs.min",
        react: "lib/react.production.min.js",
        reactdom: "lib/react-dom.production.min.js",
        underscore: "lib/underscore-min.js",
        backbone: "lib/backbone-min.js",
    },
    shim: {
        Vue: {
            exports: "Vue"
        },
        jquery: {
            exports: '$'
        },
        underscore: {
            exports: '_'
        },
        backbone: {
            deps: ["underscore", "jquery"],
            exports: "Backbone"
        },
        console: {
            exports: "console"
        }
    }
});

// load the vue main js
import Vue from 'vue'

