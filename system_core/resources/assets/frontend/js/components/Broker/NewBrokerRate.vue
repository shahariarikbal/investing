<template>
    <div class="rating-form">
        <form @submit.prevent="submit">
                <star-rating v-model="review.rating" :increment="1" :star-size="40" />

                <div class="form-group" v-if="review.rating">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        placeholder="Enter title"
                        required
                        class="form-control" 
                        v-model="review.title"
                    />
                </div>

                <div class="form-group" v-if="review.rating">
                    <label for="comment">Comment</label>
                    <textarea id="comment" class="form-control" v-model="review.comment" /> 
                </div>

                <div class="form-group" v-if="review.rating">
                    <button type="submit" class="btn btn-primary">Review</button>
                </div>

            </form>
    </div>
</template>


<script>
import StarRating from 'vue-star-rating'
export default {
    components: {
        StarRating
    },
    props: {
        broker:{
            type: Object,
            required: true,
        },
        review: {
            type:Object,
            default() {
                return{
                    rating: 0,
                    title: '',
                    comment: ''
                }
            }
        }
    },
    methods: {
        submit() {
            let params= {
                broker_id: this.broker.id,
                value: this.review.rating,
                title: this.review.title,
                comment: this.review.comment,
            }

            axios.post(`/api/brokers/${this.broker.id}/reviews`, params)
                .then(res => {
                    alert(res.data.message)
                    this.review.rating = 0;
                    this.review.title = '';
                    this.review.comment = ''
                })
                .catch(error=> {
                    if (error.response.status == 401) {
                        window.sessionStorage.setItem('pending-request', JSON.stringify({
                            method: 'post',
                            url: `/api/brokers/${this.broker.id}/reviews`,
                            data: params
                        }) );

                        this.review.rating = 0;
                        this.review.title = '';
                        this.review.comment = ''
                    }
                })
        }
    }
}
</script>