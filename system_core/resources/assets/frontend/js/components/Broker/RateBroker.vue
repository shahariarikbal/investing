<template>
    <div class="rate-broker">
        <div class="p-5">
            Give a review
            <NewBrokerRate :broker="broker" @store="newReview" />
        </div>
        
        <div class="reviews">
            <div class="media" v-for="review in broker.published_ratings" :key="review.id">
                <img :src="review.model.avater" class="mr-3" :alt="review.model.full_name">
                <div class="media-body">
                    <h5 class="mt-0">{{review.title}}</h5>
                    <star-rating :rating="review.value" read-only  :star-size="20" />
                    <p>{{review.comment}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating'
import NewBrokerRate from './NewBrokerRate'
export default {
    components: {
        StarRating,
        NewBrokerRate
    },
    props: {
        broker:{
            type: Object,
            required: true,
        }
    },
    data () {
        return {
        }
    },
    created () {

    },
    computed: {

    },
    methods: {
        newReview (review) {
            this.broker.published_ratings.unshift(review);
        }
    }
}
</script>