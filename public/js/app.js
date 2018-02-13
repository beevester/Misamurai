import Vue from 'vue';
import App from './App.vue';

new Vue({
  el: '#app',
  render: h => h(App)
})

function openNav(){
  document.getElementById("slideSideBar").style.width = "250px";
  document.getElementById("mainContent").style.marginLeft = "250px";
}

function closeNav(){
  document.getElementById("slideSideBar").style.width = "0";
  document.getElementById("mainContent").style.marginLeft = "0";
}

