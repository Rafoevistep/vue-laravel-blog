<template>
    <div>
        <div class="card-box">
            <div class="d-flex mt-5 justify-content-center">
                <b-card :title="post.title" tag="article" class="mb-2 single-post-item">
                    <template #header>
                            <small class="text-muted">Created {{moment(post.created_at).format("MMMM Do YYYY, h:mm:ss a")}} </small>
                    </template>
                    <b-card-text class="single-post-bod">
                        {{ post.body }}
                    </b-card-text>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
import Spin from "../components/Spin";
import axios from "axios";
import moment from 'moment';

export default {
    components: {
        Spin,
    },
    mounted() {
        this.loadPosts(this.$route.params.id)
    },
    data: () => ({
        loading: true,
        post: [],
        not_found: false,
        moment: moment,
    }),
    methods: {
        loadPosts(id) {
            axios.get('/api/posts/' + id)
                .then(res => {
                    this.post = res.data.data;
                    this.loading = false;

                })
                .catch(err => {
                    this.$message ={
                        type:"success",
                        message:"Post loaded successfully"
                    }
                })
        },
    },
}

</script>

<style scoped>
    .single-item{
        width: 50%;
        height: auto;
    }

    .single-post-body{
        height: auto;
    }
</style>
