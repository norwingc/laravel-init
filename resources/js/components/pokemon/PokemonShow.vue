<template>
    <section class="container row m-auto" v-if="!loading">
        <div class="col-md-3 offset-md-2">
            <ul>
                <li v-for="(ability, index) in pokemon.abilities" :key="index">{{ ability.ability.name }}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <img :src="`${pokemon.sprites.front_default}`" alt="" class="img-fluid m-auto">
        </div>

		<pokemon-information :id="id" class="mt-5"/>
    </section>
</template>

<script>

import PokemonInformation from './PokemonInformation'

export default {
	props: ['id'],
	components:{
		PokemonInformation
	},
    data(){
        return{
            pokemon: {},
            loading: true
        }
    },
    created(){
        this.getPokemon()
    },
    methods:{
        async getPokemon(){
            this.loading = true
            await axios.get(`https://pokeapi.co/api/v2/pokemon/${this.id}`).then(res => {
                this.pokemon = res.data
                this.loading = false
            })
        }
    }
}
</script>
