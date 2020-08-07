<template>
	<section class="mt-5">
		<div class="comments">
			<div class="comment" v-for="(comment, index) in comments.comments" :key="index">
				<p >{{ comment.body }} <small>{{ comment.created_at }}</small></p>
				<hr>
			</div>
		</div>
		<div>
			<div class="form-group">
				<div class="alert alert-danger" v-if="erros != null">{{ erros.body[0] }}</div>
				<input type="text" v-model="comment.body" @keyup.enter="store()" class="form-control" required>
			</div>
		</div>
	</section>
</template>

<script>
export default {
	props: ['id'],
	data(){
		return{
			comment: {},
			comments: [],
			erros: null
		}
	},
	created(){
		this.getComments()
	},
	methods:{
		async getComments(){
			await axios.get(`/Comments/get/${this.id}`).then(res => {
				this.comments = res.data.comments
			})
		},
		async store(){
			await axios.post(`/Comments/store/${this.id}`, this.comment).then(res => {
				this.comments.comments.push(res.data.comment)
				this.comment = {}
			}).catch((err) => {
				this.erros = err.response.data.errors
			})
		}
	}
}
</script>
