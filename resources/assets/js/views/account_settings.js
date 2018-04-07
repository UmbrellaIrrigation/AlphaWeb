/**
 * Form and Vue Element
 */

import User from '../models/user';
import axios from 'axios';

class Errors {
    constructor() {
        this.errors = { };
    }

    get(field) {
        if( this.errors[field] ) {
            return this.errors[field][0];
        }
    }

    record(error) {
        this.errors = error;
    }
}

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
        editingPassword: false,
        errors: new Errors()
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
        
        onSubmitName: function() {
            this.editingName = false;
            axios.post('/settings/name', {
                name: this.$data.user.name
            }).then(response => alert('Successfully changed name'))
            .catch( error => this.errors.record(error.response.data.errors));
        },
        onSubmitDescription: function() {
            this.editingDescription = false;
            axios.post('/settings/description', {
                description: this.$data.user.description
            }).then(response => alert('Successfully changed description'))
            .catch( error => this.errors.record(error.response.data.errors));
        },
        onSubmitEmail: function() {
            this.editingEmail = false;
            axios.post('/settings/email', {
                email: this.$data.user.email
            }).then(response => alert('Successfully changed email'))
            .catch( error => this.errors.record(error.response.data.errors));
        },
        onSubmitPassword: function() {
            this.editingPassword = false;
            alert('saving');
        }
    }
});

