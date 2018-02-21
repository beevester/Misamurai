define(['Vue'], function(Vue){
  
  Vue.component('test', {
    prop: ['name']
  }

  );

  var a = new Vue({
    el: '#app'
  })
})
