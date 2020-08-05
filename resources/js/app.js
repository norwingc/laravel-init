/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'

import Pokemons from './components/pokemon/Pokemons.vue'
import PokemonShow from './components/pokemon/PokemonShow'
import EditUser from  './components/user/EditUser'

new Vue({
    el: '#app',
    components:{
        Pokemons,
        PokemonShow,
        EditUser
    }
});
