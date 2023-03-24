<template>
                <b-card :title="post.title" class = "post-item">
                    <b-card-text class="post-body">{{ post.body }}</b-card-text>
                    <template #footer>
                        <small class="text-muted">Last updated {{moment(post.updated_at).format("MMMM Do YYYY, h:mm:ss a")}} </small>
                    </template>
                    <b-button href="#" variant="primary" @click=goToBlog(post.id)>Go somewhere</b-button>
                </b-card>
</template>
<script>

import moment from 'moment';

export default {
    data: () => ({
        moment: moment,
    }),
    props: {
        post: {
            require: true,
            type: Object,
        },
    },
    methods:{
        goToBlog(id){
            this.$router.push(`post/${id}`);
        }
    }
}
</script>
<style>
.post-item h4{
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
}

.post-body {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    max-height: 16rem;
    height: 46%;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}
</style>
