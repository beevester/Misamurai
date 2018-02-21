require('./script2.js');

function loadScript3() {
    require.ensure([], function() {
        require('@AnotherBundle/Resources/assets/script3.js');
        require('style.css');
    });
}