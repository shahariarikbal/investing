<template>
    <div class="tab-pane fade show active" id="pills-subscription" role="tabpanel" aria-labelledby="pills-subscription-tab">
        <table class="table table-bordered" v-if="subscriptions.length > 0">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Plan</th>
                    <th>Subscription</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody v-if="subscriptionPages.length > 0">
                <tr v-for="(subscription, index) in subscriptionPages[currentPage - 1]" :key="subscription.id">
                    <td>{{ index + 1 }}</td>
                    <td>
                        <display-plan :plan="subscription.plan" />
                    </td>
                    <td>{{ subscription.start_at | moment('llll') }} - {{ subscription.ends_at | moment('llll') }}</td>
                    <td>{{ subscription.status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import DisplayPlan from '@p/DisplayPlan.vue'

    export default {
        data () {
            return {
                subscriptions: [],
                subscriptionPages: [],
                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Subscription Information From The Server. Please Wait!',
            }
        },
        components: { DisplayPlan },
        created () {
            axios.get(`/xhr/admin/member-management/members/${this.$route.params.id}/subscriptions`)
                .then(response => {
                    this.subscriptions = response.data.subscriptions
                    this.generatePages(this.subscriptions)
                })
        },
        methods: {
            generatePages (subscriptions) {
                this.subscriptionPages = _.chunk(subscriptions, this.perPage)
              
                this.pageCount = this.subscriptionPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Subscription Found"
                }
            },
        }
    }
</script>