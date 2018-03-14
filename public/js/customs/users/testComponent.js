define(['Vue'], function(Vue){
  Vue.component('my-checkbox', {
    data() {
      return {
        message: 'Test is a go'
      }
    }
  });

  new Vue({
    el: "#app",
  })
})
