require('./bootstrap');

window.Vue = require('vue');

Vue.component('meubotao', require('./components/meubotao.vue').default);

const app = new Vue({
  el: '#app',
});