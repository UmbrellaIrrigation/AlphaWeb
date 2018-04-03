/**
 * Form and Vue Element
 */

import SettingsFormGroup from '../components/SettingsFormGroup';
import axios from 'axios';

const app = new Vue({
    el: '#settings',

    template: `
    <h1 style="padding-top:200px;">Helloooooo</h1>
    `,

    components: {
        SettingsFormGroup
    },

    data: {
        userForm: new Form({
            name: ''
        }),
        user: Object,
    },

    mounted() {
        axios.get('/getsettings').then(response => {
            this.user = response.data;
            console.log(response.data);
        }).catch(e => {
            console.log(e);
        });
    }
});

