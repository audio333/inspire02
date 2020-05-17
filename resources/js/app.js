/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');

 import Vuetify from "../plugins/vuetify"

 import VueRouter from 'vue-router'
 import VueFuse from 'vue-fuse'

 Vue.use(VueRouter)
 Vue.use(VueFuse)

 console.log(window.user);

 import Auth from './auth'

 Vue.prototype.$auth = new Auth(window.user);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('articles', require('./components/Articles.vue').default);
Vue.component('hero-slider', require('./components/HeroSlider.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('search-focus', require('./components/ToggleOverlay.vue').default);

// Laravel Passport
Vue.component('passport-clients', require('./components/passport/Clients.vue').default);
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);

// Admin Panel
Vue.component('admin', require('./components/Admin.vue').default);
import Dashboard from './pages/Dashboard'
import Users from './pages/Users'
import Roles from './pages/Roles'
import Permissions from './pages/Permissions'
import Settings from './pages/Settings'
import Developer from './pages/Developer'
import Activities from './pages/Activities'

const routes = [
	{
		path: '/admin/',
		component: Dashboard
	},
	{
		path: '/admin/users',
		component: Users
	},
	{
		path: '/admin/roles',
		component: Roles
	},
	{
		path: '/admin/permissions',
		component: Permissions
	},
	{
		path: '/admin/settings',
		component: Settings
	},
	{
		path: '/admin/developer',
		component: Developer
	},
	{
		path: '/admin/activities',
		component: Activities
	},
];

const router = new VueRouter({
	mode: 'history',
	routes,
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const app = new Vue({
 	el: '#app',
 	vuetify: Vuetify,
 	router,
 });
