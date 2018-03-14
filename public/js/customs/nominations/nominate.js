define(['Vue', 'axios'], function(Vue, axios){
  new Vue({
    el: "#app",
    delimiters: ['${', '}'],
    data() {
      return {
        nomineeInput: '',
        userApi: [],
        show: false,
        nominee: ' ',
        comment: '',
        nominationApi: []
      }
    },
    watch: {
      nomineeInput: function() {

        this.confirmNominee();
      }
    },
    created() {
      this.loadUserApi();
      this.loadNominationApi();
    },
    methods: {
      loadUserApi: function() {
        axios.get('/api/users').then(response => {
          this.status = 'Loading users'
          // JSON responses are automatically parsed.
          this.userApi = response.data;
        })
        .catch(e => {
          this.errors.push(e)
        })
      },
      loadNominationApi: function() {
        axios.get('/api/nominations').then(response => {
          this.status = 'Loading users'
          // JSON responses are automatically parsed.
          this.nominationApi = response.data;
        })
        .catch(e => {
          this.errors.push(e)
        })
      },
      async postNominee() {
        axios.post('/api/nominate/store', {
          nominee: this.nominee,
          user: this.user,
          comment: this.comment

        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
        },
      confirmNominee() {
        // console.debug('confirmed again');
        if(this.nominee == this.nomineeInput){
          console.debug('confirmed again');
          this.show = true;
        }else{
          this.show = false;
        }
      },
    },
    computed: {
    filteredList: function() {
      if (this.nomineeInput.length > 0){
        return this.userApi.filter(user => {
          return user.username.toLowerCase().includes(this.nomineeInput.toLowerCase())
        })
      }
    },

  }
})

})
