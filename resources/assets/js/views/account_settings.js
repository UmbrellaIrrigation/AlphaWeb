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
        user: User,
        editingName: false,
        editingDescription: false,
        editingEmail: false,
        editingPassword: false
    },

    mounted() {
        axios.get('/getsettings').then(response => {
            this.user = new User(response.data);
        }).catch(e => {
            console.log(e);
        });
    },
    
    methods: {
        editName: function( param ) {
            this.editingName = param;
        },
        editDescription: function( param ) {
            this.editingDescription = param;
        },
        editEmail: function( param ) {
            this.editingEmail = param;
        },
        editPassword: function( param ) {
            this.editingPassword = param;
        },
        
        onSubmit: function() {
            alert('saving');
        }
    }
});

