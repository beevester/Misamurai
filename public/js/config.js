requirejs.config({
    baseUrl: '/js/',
    paths: {
        Vue: "lib/vue/dist/vue.min",
        Vuejs: "lib/requirejs-vue/requirejs-vue",
        jquery: "lib/jquery/dist/jquery.min",
        react: "lib/react/react.production.min",
        reactdom: "lib/react/react-dom.production.min",
        bootstrap: "lib/bootstrap/dist/js/bootstrap.bundle.min",
        underscore: "lib/underscore-min",
        backbone: "lib/backbone-min",
        browser: "lib/babel/browser.min",
        axios: "lib/axios/dist/axios.min",
        popper: "lib/popper/dist/popper.min",
        lodash: "lib/lodash.min",
        select2: "lib/select2/dist/js/select2.min"
    },
    shim: {
        Vue: {
            exports: "Vue",
    },
}
});

require(['bootstrap'], function(){})
