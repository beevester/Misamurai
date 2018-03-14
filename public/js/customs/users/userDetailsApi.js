define(['Vue', 'axios', 'lodash'], function(Vue, axios, _) {
new Vue({
    el: "#app",
    delimiters: ['${', '}'],
    data() {
      return {
        userApi: [],
        status: 'Test',
        userRoot: '',
        userObj: [],
        userInput: '',
      }
    },
    watch: {
      nomineeInput: function(){
      },
      userInput: {

      }
    },
    created() {
        this.loadUserApi();
    },
    methods: {
      loadUserApi: function() {
        axios.get('/api/users').then(response => {
          this.status = 'Loading users'
          // JSON responses are automatically parsed.
          this.userApi = response.data;

          console.debug(response.data);
        })
        .catch(e => {
          this.errors.push(e)
        })
      },
      },
      })})
