import Vue from 'vue'
import Router from 'vue-router'
import FormResume from './components/FormResume.vue'
import ViewResume from './components/ViewResume.vue'

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'create-resume',
      component: FormResume
    },
    {
      path: '/view-resume/:id',
      name: 'view-resume',
      component: ViewResume
    },
  ]
})
