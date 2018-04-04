/**
 * Form and Vue Element
 */

import User from '../models/user';
import axios from 'axios';

const app = new Vue({
    el: '#app',

    data: {
        userForm: new Form({
            name: ''
        }),
        user: User
    },

    mounted() {
        axios.get('/getsettings').then(response => {
            this.user = new User(response.data);
        }).catch(e => {
            console.log(e);
        });
    }
});

