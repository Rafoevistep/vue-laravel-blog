<template>
    <div>
        <h1>Post Update!</h1>
        <div>
            <b-alert show dismissible variant="danger" v-if="error">
                Check the entered data
            </b-alert>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <b-form-group id="input-group-1" label="Title:" class="mt-2 mb-2" label-for="input-1"
                    description="We'll never share your post with anyone else.">
                    <b-form-input id="input-1" v-model="form.title" type="text" placeholder="Enter Title"
                        required></b-form-input>
                </b-form-group>
                <b-form-textarea id="textarea-rows" v-model="form.body" placeholder="Enter the text of your post"
                    rows="8"></b-form-textarea>
                <b-button variant="primary" @click.prevent="store">
                    <b-spinner small v-if="loading"></b-spinner>
                    <span v-else class="sr-only">Publish</span>
                </b-button>
                <b-button type="reset" variant="danger">Reset</b-button>
            </b-form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            form: {
                title: '',
                body: ''
            },
            show: true,
            loading: false,
            error: false,
            dismissSecs: 5,
            dismissCountDown: 0,
            showDismissibleAlert: false
        }
    },
    methods: {
        store() {
            this.loading = true
            axios.post('/api/posts', this.form, {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(res => {
                    console.log(res.data)
                    if (res.data.success === true) {
                        this.$router.push('/post/' + res.data.data.id)
                    } else {
                        setTimeout(() => {
                            this.loading = false;
                        }, 300);
                        this.error = true
                    }
                })
        },
        onSubmit(event) {
            event.preventDefault()
            alert(JSON.stringify(this.form))
        },
        onReset(event) {
            event.preventDefault()
            // Reset our form values
            this.form.title = ''
            this.form.body = ''
            // Trick to reset/clear native browser form validation state
            this.show = false
            this.$nextTick(() => {
                this.show = true
            })
        },
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },
        showAlert() {
            this.dismissCountDown = this.dismissSecs
        }
    }

}
</script>

<style scoped>
#textarea-rows {
    margin-bottom: 20px;
}
</style>
