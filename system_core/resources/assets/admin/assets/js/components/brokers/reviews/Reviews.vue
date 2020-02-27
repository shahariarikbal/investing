<template>
    <div class="reviews">
        <Review v-for="review in reviews" :key="review.id" :review="review" @update="update" />
        <nav aria-label="Page navigation example" v-if="pages > 1">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" v-if="current_page > 1" @click.prevent="changePage(current_page-1)">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item" v-for="i in pages" :key="i" :class="{'active': current_page == i}"><a class="page-link" href="#" @click.prevent="changePage(i)">{{i}}</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next" v-if="pages > current_page" @click.prevent="changePage(current_page+1)">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import Review from './Review'
export default {
    components: {
        Review
    },
    props: {
        status: {
            type: String,
            default: 'pending',
            pages: 1,
            current_page: 1
        }
    },
    data () {
        return {
            reviews: [],
            loading: false,
        }
    },
    watch: {
        status () {
            this.getRevies();
        }
    },
    created () {
        this.getRevies();
    },
    computed: {

    },
    methods: {
        getRevies () {
            if (this.loading) {
                return
            }

            this.loading = true;

            let params = {
                status: this.status,
                page: this.current_page,
                perpage: 30
            }

            axios.get('/xhr/admin/brokers/reviews', {params: params})
                .then(res=>{
                    this.reviews = res.data.data
                    this.pages = res.data.last_page
                    this.current_page = res.data.current_page
                    this.loading = false;
                })
        },
        update (review) {
            let i = this.reviews.findIndex(r => r.id === review.id );

            if (i!== -1 && review.status !== this.status) {
                this.reviews.splice(i, 1);
                this.getRevies()
            } else{
                this.reviews[i] = review;
            }
            this.$forceUpdate()
        },
        deleteReview(review) {
            let i = this.reviews.findIndex(r => r.id === review.id );

            if (i!== -1) {
                this.reviews.splice(i, 1);
            }
        },
        changePage(page) {
            this.current_page = page
            this.getRevies();
        }
    }
}
</script>