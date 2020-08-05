<template>
    <section class="row pokemons">
        <a :href="`/Pokemon/${index+1}`" v-for="(pokemon, index) in pokemons" :key="index" class="col-md-3 p-5 pokemon">
            {{ pokemon.name }}
        </a>
    </section>
</template>

<script>
export default {
    data(){
        return{
            pokemons: []
        }
    },
    created(){
        this.getPokemons()
    },
    methods:{
        async getPokemons(){
            await axios.get(`https://pokeapi.co/api/v2/pokemon`).then(res => {
                this.pokemons = res.data.results
            })
        }
    }

}
</script>
