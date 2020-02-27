<template>
    <div>
        <div class="like" @click="toggle">
            <a href="#" :class="liked">
                <i class="fas fa-thumbs-up"></i>
            </a>
            <span class="count-tag" v-text="count"></span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                service: ''
            }
        },
        computed: {
            liked () {
                return this.service.is_liked ? 'liked' : ''
            },
            count () {
                return this.service.likes_count
            }
        },
        created () {
            this.service = JSON.parse(this.data)
        },
        methods: {
            toggle() {
                // console.log(this.service.permalink + '/like')
                axios.post(this.service.permalink + '/like')
                    .then(( response ) => {
                        if (response.status === 200) {
                            console.log(response.data)
                            this.service = response.data
                        }
                        
                    }).catch(( error ) => {
                        console.log(error)
                    })
            }
        }
    }
</script>

<style type="scss" scoped>
    .liked {
        color: #22abf4 !important;
    }
</style>