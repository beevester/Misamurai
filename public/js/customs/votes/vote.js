define(['Vue', 'axios'], function(Vue, axios){
  new Vue({
    el: "#app",
    delimiters: ['${', '}'],
    data() {
      return {
        voteApi: [],
        vote: ''
      }
    },
    created() {
      this.loadVoteApi();
    },
    methods: {
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
    }
  })
})
