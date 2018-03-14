define(['Vue'], function(Vue){
  new Vue({
    el: "#app",
    delimiters: ['${', '}'],
    data() {
      return {
        permissionType: 'Crud',
        resource: '',
        crudSelected: []
      }
    },
    methods: {
          crudName: function(item) {
            return item.substr(0,1).toUpperCase() + item.substr(1) +" " + this.resource.substr(0,1).toUpperCase() + this.resource.substr(1);
          },
          crudSlug: function(item) {
            return item.toLowerCase() + "-" + this.resource.toLowerCase();
          },
          crudDescription: function(item) {
            return "Allow a User to " + item.toUpperCase() + " a " + this.resource.substr(0,1).toUpperCase() + this.resource.substr(1);
          }
        }
  })
})
