<template>
<div class="container-fluid" style="margin-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="addData()">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" v-model="form.title" class="form-control" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Body :</label>
                            <textarea class="form-control" name="content" v-model="form.content" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                title: '',
                content: ''
            }
        }
    },
    methods: {
        addData() {
            let uri = 'http://127.0.0.1:8000/api/articles/post';
            axios
                .post(uri, {
                    title: this.form.title,
                    content: this.form.content
                })
                .then(response => {
                    this.$router.push("/contact");
                });
        }

    }

}
</script>
