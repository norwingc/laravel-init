<template>
    <div @submit.prevent="store()" class="container">
        <form class="form">
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="user_edit.email">
                </div>
                <div class="col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="user_edit.password">
                </div>
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" v-model="user_edit.personal_information.first_name">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" v-model="user_edit.personal_information.last_name">
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Education Level</label>
                    <select class="form-control" v-model="user_edit.education_information.education_level">
                        <option value="Universidad">Universidad</option>
                        <option value="Tecnologo">Tecnologo</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Study</label>
                    <input type="checkbox" class="form-control" v-model="user_edit.education_information.study">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data(){
        return{
            user_edit: {}
        }
    },
    created(){
        this.user_edit = this.user
        if(this.user_edit.education_information == null) this.user_edit.education_information = {}
    },
    methods:{
        async store(){
            await axios.post(`/edit`, this.user_edit).then(res => {
                if(res.data.saved){
					alert('User updated')
				}
            })
        }
    }

}
</script>
