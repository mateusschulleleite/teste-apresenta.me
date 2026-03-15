import '../css/app.css';
import { createApp } from 'vue'

import Login from './pages/Login.vue'
import Dashboard from './pages/Dashboard.vue'
import Pessoas from './pages/Pessoas.vue';

if(document.getElementById('login')){
    createApp(Login).mount('#login')
}

if(document.getElementById('dashboard')){
    createApp(Dashboard).mount('#dashboard')
}

if(document.getElementById('pessoas')){
    createApp(Pessoas).mount('#pessoas')
}