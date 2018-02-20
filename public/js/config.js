requirejs.config({
    baseUrl: 'js/',
    paths: {
        Vue: "lib/vue.min",
        jquery: "lib/jquery-3.3.1.min",
        bootstrap: "lib/bootstrap.min",
        Vueity: "lib/vuetify.min.js",
        
    },
    shim: {
        "Vue": {"exports": "Vue"}
    }
});

// load the vue main js
require(["customs/vueApp"], function(){
   
});
