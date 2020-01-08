/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Swal from 'sweetalert2/dist/sweetalert2.js'
import axios from 'axios'

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebarsuperadmin-component', require('./components/sidebar/SuperAdminSidebarComponent.vue').default);
Vue.component('sidebaradmin-component', require('./components/sidebar/AdminSidebarComponent.vue').default);
Vue.component('sidebarfinanceiro-component', require('./components/sidebar/FinanceiroSidebarComponent.vue').default);
Vue.component('sidebarpai-component', require('./components/sidebar/PaiSidebarComponent.vue').default);
Vue.component('sidebarprofessor-component', require('./components/sidebar/ProfessorSidebarComponent.vue').default);
Vue.component('admin-component', require('./components/dashboard/AdminComponent.vue').default);
Vue.component('turmas-component', require('./components/TurmasComponent.vue').default);
Vue.component('usuarios-component', require('./components/UsuariosComponent.vue').default);
Vue.component('novofuncionario-component', require('./components/funcionarios/NovoFuncionarioComponent.vue').default);
Vue.component('funcionarios-component', require('./components/funcionarios/FuncionariosComponent.vue').default);
Vue.component('funcionarios_removidos-component', require('./components/funcionarios/FuncionariosRemovidosComponent.vue').default);
Vue.component('novoaluno-component', require('./components/alunos/NovoAlunoComponent.vue').default);
Vue.component('alunos-component', require('./components/alunos/AlunosComponent.vue').default);
Vue.component('alunos_removidos-component', require('./components/alunos/AlunosRemovidosComponent.vue').default);
Vue.component('alunos_responsaveis-component', require('./components/alunos/AlunosResponsaveisComponent.vue').default);
Vue.component('matricula_aluno-component', require('./components/alunos/MatriculaAlunoComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(require('vue-moment'));

const app = new Vue({
    el: '#app',
});
