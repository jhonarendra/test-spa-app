<template>
<div class="container-fluid" style="margin-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="updateData()">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" v-model="form.title" name="title" class="form-control" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Body :</label>
                            <textarea class="form-control" v-model="form.content" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                title: "",
                content: ""
            }
        }
    },
    created() {
        this.showData();

    },
    methods: {
        showData() {
            let uri = 'http://127.0.0.1:8000/api/articles/detail/' + this.$route.params.id;
            axios
                .get(uri)
                .then(response => {
                    this.form.title = response.data.data.title;
                    this.form.content = response.data.data.content;
                });
        },

        updateData() {
            let uri = 'http://127.0.0.1:8000/api/articles/update/' + this.$route.params.id;
            axios
                .put(uri, {
                    title: this.form.title,
                    content: this.form.content
                })
                .then(response => {
                    this.$router.push('/contact');
                });
        }

    }

}
</script>
