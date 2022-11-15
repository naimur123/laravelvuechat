/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import '../sass/app.scss'
import { createApp } from 'vue';

import ExammpleComponent from './components/ExampleComponent.vue'
// import Messages from './components/Messages.vue'


// createApp(Messages).mount('#messenger');
createApp(ExammpleComponent).mount('#app');
