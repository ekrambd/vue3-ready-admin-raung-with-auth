import { createWebHistory, createRouter } from 'vue-router';

import login from './pages/login.vue';
import dashboard from './pages/dashboard.vue';

const routes = [
   {
   	  path: '/',
   	  name: 'Login',
   	  component: login,
   	  meta:{
   	  	requiredAuth: false,
   	  }
   },

   {
   	  path: '/dashboard',
   	  name: 'Dashboard',
   	  component: dashboard,
   	  meta:{
   	  	requiredAuth: true,
   	  }
   },

];

const router = createRouter({
	history: createWebHistory(),
	routes
});

router.beforeEach((to,from)=>{
	if(to.meta.requiredAuth && !localStorage.getItem('token')){
		return {name: 'Login'}
	}
});

export default router;