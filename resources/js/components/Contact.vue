<template>
<div class="container-fluid" style="margin-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <router-link :to="{ name: 'contact-add' }" class="btn btn-primary"> Tambah Data</router-link>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(article, index) in articles" :key="article.id">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ article.title }}</td>
                                <td>{{ article.content }}</td>
                                <td>
                                    <div class="form-group">
                                        <router-link :to="'contact/edit/'+article.id" class="btn btn-primary"> Edit</router-link>
                                        <button class="btn btn-danger" v-on:click="deleteData(article.id)"> Delete </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
            articles: []
        }
    },
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            let uri = 'http://127.0.0.1:8000/api/articles';
            axios.get(uri)
                .then((response) => {
                    this.articles = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        deleteData(id) {
            let uri = 'http://127.0.0.1:8000/api/articles/delete/' + id;
            axios.delete(uri)
                .then(response => {
                    this.loadData();
                })
        }
    }

}
</script>
