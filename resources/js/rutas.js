import Vue from 'vue';
import Router from 'vue-route';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./views/login'),
        },
        {
            path: '/registro',
            name: 'registro',
            component: require('./views/registro'),
        },
        {
            path: '/conversaciones',
            name: 'conversaciones',
            component: require('./views/conversacion'),
            meta: {
                requiresAuth: true
            }
        }
    ],
    linkExactActiveClass: 'active',
    mode: 'history',
    scrollBehavior(){
        return {x:0, y:0}
    }
});