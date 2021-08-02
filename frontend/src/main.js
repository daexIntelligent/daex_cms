import Vue from 'vue';

import 'normalize.css/normalize.css'; // A modern alternative to CSS resets

// import ElementUI from 'element-ui';
// import 'element-ui/lib/theme-chalk/index.css';

import Element from 'element-ui';
import '@/styles/element-variables.scss';
import locale from 'element-ui/lib/locale/lang/en'; // lang i18n

import '@/styles/index.scss'; // global css

import App from '@/App';
import store from '@/store';
import router from '@/router';

import '@/icons'; // icon
import '@/permission'; // permission control
import ToggleButton from 'vue-js-toggle-button'
Vue.use(ToggleButton);

// set ElementUI lang to EN
Vue.use(Element, {size: 'medium', locale: locale});

Vue.config.productionTip = false;

new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
});
