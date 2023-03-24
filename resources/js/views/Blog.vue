<template>
    <div>
        <h1>Welcome Blog page!</h1>
        <spin v-if="loading"></spin>
        <div class="card-box" v-else>
            <b-card-group deck>
                <post v-for="post in posts" v-bind:key="post.id" :post="post" />
            </b-card-group>
        </div>
    </div>
</template>

<script>
import Spin from "../components/Spin";
import axios from "axios";
import Post from '../components/blog/Post.vue'

export default {
    components: {
        Spin,
        Post,
    },
    data: () => ({
        loading: true,
        posts: [],
    }),
    mounted() {
        this.loadPosts();
    },
    methods: {
        loadPosts() {
            axios.get("api/posts")
                .then(res => {
                    this.posts = res.data.data;
                        this.loading = false;
                })
        },
    },

}


</script>

<style scoped>
.card-deck {
    margin-top: 20px;
    display: grid;
    grid-template-columns: auto auto auto;
    grid-gap: 20px;
}
</style>
