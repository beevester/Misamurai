define(['react', 'reactdom', 'jquery'], function(React, ReactDOM, $) {
	ReactDOM.render(
    	React.createElement('p', {}, 'Hello, AMD!'),
        document.getElementById('root')
    );
});
