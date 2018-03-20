define(['Vue', 'axios'], function(Vue, axios){
  new Vue({
    el: "#app",
    delimiters: ['${', '}'],
    data() {
      return {
        permissionApi: [],
        selected_permissions: []
      }
    },
    created() {
      this.loadPermissionApi();
    },
    methods: {
      loadPermissionApi: function() {
        axios.get('/api/permissions').then(response => {
          this.permissionApi = response.data;
        })
        .catch(e => {
          this.errors.push(e)
        })
      },
    }
  })
})
