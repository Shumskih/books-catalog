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

Vue.component('search-authors-component', require('./components/SearchAuthorsComponent.vue'));
Vue.component('search-books-component', require('./components/SearchBooksComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

function debounce(fn, delay = 300) {
    var timeoutID = null;

    return function () {
        clearTimeout(timeoutID);

        var args = arguments;
        var that = this;

        timeoutID = setTimeout(function () {
            fn.apply(that, args);
        }, delay);
    }
}

// this is where we integrate the v-debounce directive!
// We can add it globally (like now) or locally!
Vue.directive('debounce', (el, binding) => {
    if (binding.value !== binding.oldValue) {
        // window.debounce is our global function what we defined at the very top!
        el.oninput = debounce(ev => {
            el.dispatchEvent(new Event('change'));
        }, parseInt(binding.value) || 300);
    }
});

const app = new Vue({
    el: '#app',
    template: [
        '<search-authors-component></search-authors-component>',
        '<search-books-component></search-books-component>'
    ]
});
