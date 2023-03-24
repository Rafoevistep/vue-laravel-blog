<template>
    <div class="container">
        <b-nav align="center" class="navbar">
            <b-nav-item active v-for="link in links" v-bind:key="link.id">
                <router-link :to="link.href">{{ link.title }}</router-link>
            </b-nav-item>
            <b-nav-item-dropdown right>
                <template #button-content>
                    <em>Post</em>
                </template>
                <b-nav-item active v-for="post in posts" v-bind:key="post.id">
                    <router-link :to="post.href">{{ post.title }}</router-link>
                </b-nav-item>
            </b-nav-item-dropdown>
        </b-nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    title: "Home",
                    href: "/"
                },
                {
                    title: "Blog",
                    href: "/blog"
                }
            ],
            posts: [
                {
                    title: "Create Post",
                    href: "/create"
                },
                {
                    title: "Edit Post",
                    href: "post/edit"
                },
                {
                    title: "Delete Post",
                    href: "post/delete"
                }
            ],
        }
    }
}
</script>

<style scoped>
.container {
    margin-top: 20px;
}

a {
    text-decoration: none;
}
</style>
