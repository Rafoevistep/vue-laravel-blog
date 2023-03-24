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
export default {
    name: "test"
}
</script>

<style scoped>

</style>
