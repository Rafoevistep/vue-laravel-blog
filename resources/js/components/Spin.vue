<template>
    <div>
        <div class="text-center">
            <b-spinner variant="primary"></b-spinner>
        </div>
    </div>
</template>

<script>
export default {
    name: "Spin",
}


</script>

<style scoped>
.text-center span {
    width: 3rem;
    height: 3rem;
    position: absolute;
    top: 50%;
}
</style>
