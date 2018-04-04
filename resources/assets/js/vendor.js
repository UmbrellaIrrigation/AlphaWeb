
window._ = require('lodash');

/**
 * Bootstrap Dependencies
 */

try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js');

    require('bootstrap');
} catch (e) {}

/**
 * Axios Dependencies
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Vue Dependencies
 */
window.Vue = require('vue');

/**
 * Tokens
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo Dependencies
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });

/**
 * Fancytree Dependencies
 */

require('jquery.fancytree');
require('jquery.fancytree/dist/modules/jquery.fancytree.edit');
require('jquery.fancytree/dist/modules/jquery.fancytree.filter');
require('jquery.fancytree/dist/modules/jquery.fancytree.glyph');
require('jquery.fancytree/dist/modules/jquery.fancytree.table');
require('jquery.fancytree/dist/modules/jquery.fancytree.wide');
