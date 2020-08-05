<template>
	<section>
		<p>{{ pokemon_information.body }}</p>

		<comment :id="id" />
	</section>
</template>

<script>

import Comment from '../comment/Comment'

export default {
	props: ['id'],
	components:{
		Comment
	},
	data(){
		return{
			pokemon_information: {}
		}
	},
	created(){
		this.getPokemonInformation()
	},
	methods:{
		async getPokemonInformation(){
			await axios.get(`/Pokemon/Information/${this.id}`).then(res => {
				this.pokemon_information = res.data.pokemon_information
			})
		}
	}

}
</script>
