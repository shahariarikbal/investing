<template>
    <div class="media">
        <img :src="review.model.avater" class="mr-3" :alt="review.model.full_name">
        <div class="media-body">
            <h5 class="mt-0">{{review.title}}</h5>
            <StarRating :rating="review.value" read-only :star-size="12"/>
            <p>{{review.comment}}</p>
        </div>
        <div class="media-body">
            <h5>Reviewed On</h5>
            <strong>{{review.rateable.name}}</strong>
        </div>
        <div class="media-action">
            <button type="button" class="btn btn-primary btn-sm" @click.prevent="approved">Approved</button>
            <button type="button" class="btn btn-warning btn-sm" @click.prevent="cancel">Cancel</button>
            <button type="button" class="btn btn-secondary btn-sm" @click.prevent="editReview">Edit</button>
            <button type="button" class="btn btn-danger btn-sm" @click.prevent="deleteReview">Delete</button>
        </div>

        <Modal ref="edit" tagName="form" @submit.native.prevent="submit">
                <star-rating v-model="value" :increment="1" :star-size="40" />

                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        placeholder="Enter title"
                        required
                        class="form-control" 
                        v-model="title"
                    />
                </div>

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" v-model="comment" /> 
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select v-model="status" class="form-control" >
                        <option value="published">Published</option>
                        <option value="canceled">Canceled</option>
                        <option value="pending">Pending</option>
                        <option value="reviewe">Reviewe</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
        </Modal>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating';
import Modal from './../../common/Modal'
export default {
    components: {
        StarRating,
        Modal
    },
    props: {
        review: {
            type: Object,
            required: true
        }
    },
    data () {
        return{
            title: this.review.title,
            comment: this.review.comment,
            value: this.review.value,
            status: this.review.status
        }
    },
    methods:{
        approved() {
            let params = {
                status: 'published'
            }

            this.update(params)
        },
        cancel () {
            let params = {
                status: 'canceled'
            }

            this.update(params)

        },
        submit () {
            let params = {
                title: this.title,
                comment: this.comment,
                value: this.value,
                status: this.status
            }

            this.update(params);
            this.$refs.edit.hide()
        },
        update (params) {
            axios.put(`/xhr/admin/brokers/reviews/${this.review.id}`, params)
                .then(res=> {
                    this.$emit('update', res.data)
                })
        },
        editReview () {
            this.$refs.edit.show()
        },
        deleteReview () {
            axios.delete(`/xhr/admin/brokers/reviews/${this.review.id}`)
                .then(res=>{
                    this.$emit('delete', this.review);
                })
        }
    }
}
</script>