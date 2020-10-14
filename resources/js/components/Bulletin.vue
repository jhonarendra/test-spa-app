<template>
<div class="container-fluid" style="margin-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="addData()">
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:10%">No</th>
                                        <th scope="col" style="width:20%">Title</th>
                                        <th scope="col" style="width:40%">Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(article, index) in articles" :key="article.id">
                                        <th scope="row">{{ index + 1 }}</th>
                                        <td>{{ article.title }}</td>
                                        <td>{{ article.content }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
            articles: [],
            form: {
                title: '',
                content: ''
            },

            title: '',
            content: ''
        }
    },
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            let uri = 'http://127.0.0.1:8000/api/bulletin';
            axios.get(uri)
                .then((response) => {
                    this.articles = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        addData() {
            let uri = 'http://127.0.0.1:8000/api/bulletin/post';
            axios
                .post(uri, {
                    title: this.form.title,
                    content: this.form.content
                })
                .then(response => {
                    this.resetForm();
                });
        },
        resetForm() {
            this.form.title = "";
            this.form.content = "";
            this.loadData();
        }
    }
}
</script>
