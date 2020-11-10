import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./views/login').default,
        },
        {
            path: '/registro',
            name: 'registro',
            component: require('./views/registro').default,
        },
        {
            path: '/conversaciones',
            name: 'conversaciones',
            component: require('./views/conversacion').default,
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