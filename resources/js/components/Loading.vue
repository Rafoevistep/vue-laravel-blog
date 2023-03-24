<template>
    <div>
        <lottie-player class="loading" src="https://assets9.lottiefiles.com/packages/lf20_m2igjaux.json"
            background="transparent" speed="1.5" loop autoplay></lottie-player>
    </div>
</template>

<script>
export default {
    name: "Loading",
}


</script>

<style scoped>
.loading {
    width:300px;
    height: 300px;
    position: absolute;
    top: 28%;
    left: 40%;
    /* margin: 0 auto; */
}
</style>
