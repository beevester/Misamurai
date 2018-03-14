define(['react', 'reactdom', 'jquery'], function(React, ReactDOM, $){
  var users = React.createClass({
  getInitialState: function() {
  return {
  users: []
  }
  },

  loadUsersFromServer: function() {
    $.ajax({

        url: '/api/users',
        success: function (data) {
            this.setState({users: data.username});
        }.bind(this)
    });
    },
    componentDidMount: function() {
        this.loadNotesFromServer();
        setInterval(this.loadUsersFromServer, 2000);
    },

    render: function(){
        return (
          <usersList users={this.state.users} />
        )
    }
});

window.UserSection = UserSection;

ReactDOM.render(
<UserSection />,
document.getElementById('js-user-wrapper')
);
});
