import '../js/modules/sp-navigation';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    'register-books-component',
    require('./components/RegisterBooksComponent.vue').default
);
Vue.component(
    'register-book-card-component',
    require('./components/RegisterBookCardComponent.vue').default
);
Vue.component(
    'bookshelf-mybooks-component',
    require('./components/BookshelfMyBooksComponent.vue').default
);
Vue.component(
    'bookshelf-book-card-component',
    require('./components/BookshelfBookCardComponent.vue').default
);
Vue.component(
    'bookshelf-detail-component',
    require('./components/BookshelfDetailComponent.vue').default
);
Vue.component(
    'books-graph-component',
    require('./components/BooksGraphComponent.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
