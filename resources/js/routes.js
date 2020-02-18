import Home from './components/test01.vue';
import Example from './components/test02.vue';
import t3 from './components/test03.vue';

export const routes = [
    { path: '/login', component: Home, name: 'Home' },
    { path: '/Home', component: Home, name: 'Home' },
    { path: '/', component: Home, name: 'Homeee' },
    { path: '/t2/:name', component: Example, name: 'Example' },
    { path: '/t3/:avatar', component: t3, name: 't3' },
    { path: '/t3', component: t3, name: 't3' }


];