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

    clear(field) {
        delete this.errors[field];
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
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
        errors: new Errors(),

        edit_old: false,
        edit_new: false,
        edit_confirm: false,

        oldpassword: '',
        newpassword: '',
        confirmnewpassword: '',
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
            if( param == true ) {
                this.edit_old = true;
            } else {
                this.edit_old = false;
                this.edit_new = false;
                this.edit_confirm = false;
            }
        },
        
        editNewPassword: function( param ) {
            this.edit_new = param;
        },
        editConfirmPassword: function( param ) {
            this.edit_confirm = param;
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

            this.edit_old = false;
            this.edit_new = false;
            this.edit_confirm = false;

            if( this.newpassword == this.confirmnewpassword ) {
                axios.put('/settings/password', {
                    oldpassword: this.$data.oldpassword,
                    newpassword: this.$data.newpassword,
                }).then(response => {
                    console.log(response.data);
                })
                .catch( error => this.errors.record(error.response.data.errors));
                this.oldpassword = '';
                this.newpassword = '';
                this.confirmnewpassword = '';
            } else {
                this.errors.record({'password': ["Passwords do not match"]});
                this.oldpassword = '';
                this.newpassword = '';
                this.confirmnewpassword = '';
            }

        }
    }
});

