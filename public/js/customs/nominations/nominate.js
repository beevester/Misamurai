define(['Vue', 'axios'], function(Vue, axios){

  new Vue({
    el: "#app",
    // delimiters: ['${', '}'],
    data() {
      return {
        nomineeInput: '',
        userApi: [],
        show: false,
        nominee: 'test',
        comment: '',
        nominationApi: [],
        nominationId: [],
        commentsApi: [],
        searchNominee: '',
        voteApi: [],
        vote: ''
      }
    },
    watch: {
      // to confirm is the name is a user as to be considered for nomination
      nomineeInput: function() {
          this.confirmNominee();
        if (this.nomineeInput == '') {
          this.loadNominationApi();
        } else {
          this.searchNomineeApi();
        }

      },
      search: function() {
        this.filteredNominees();
      }
    },
    created() {
      this.loadUserApi();
      this.loadNominationApi();
      this.loadCommentApi();
      this.loadVoteApi();
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
      select: function (e) {
        this.$emit('showComment')
       console.log($(e.target))
     },
     loadVoteApi: function() {
       axios.get('/api/voteload').then(response => {
         this.status = 'Loading users'
         // JSON responses are automatically parsed.
         this.voteApi = response.data;
       })
       .catch(e => {
         this.errors.push(e)
       })
     },
     updateVoteApi: function() {
       axios.get('/api/vote/update/').then(response => {
         this.status = 'Loading users'
         // JSON responses are automatically parsed.
         this.voteApi = response.data;
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
      loadCommentApi: function() {
        axios.get('/api/comments').then(response => {
          this.status = 'Loading users'
          // JSON responses are automatically parsed.
          this.commentsApi = response.data;

        })
        .catch(e => {
          this.errors.push(e)
        })
      },
      searchNomineeApi: function() {
        axios.get('/api/nomination/search/' + this.nomineeInput).then(response => {
          // JSON responses are automatically parsed.
          console.debug(response.data);
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
    filteredNominees: function() {
      if (this.searchNominee.length > 0){
        return this.userApi.filter(user => {
          return user.username.toLowerCase().includes(this.searchNominee.toLowerCase())
        })
      }
    },

  }
})

})
