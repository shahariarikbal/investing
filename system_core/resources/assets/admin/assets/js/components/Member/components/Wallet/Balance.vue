<template>
    <div class="tab-pane fade show active" id="v-pills-wallet-balance" role="tabpanel" aria-labelledby="v-pills-wallet-balance-tab">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Balance</th>
                    <th>Restricted</th>
                    <th>Inreview</th>
                    <th>Pending</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ this.balance | currency }}</td>
                    <td>{{ this.restricted | currency }}</td>
                    <td>{{ this.inreview | currency }}</td>
                    <td>{{ this.pending | currency }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                member: {},
                balance: 0,
                restricted: 0, 
                inreview: 0, 
                pending: 0
            }
        },

        created () {
            console.log(this.$route.params.id)
            axios.get(`/xhr/admin/member-management/members/${this.$route.params.id}/balance`)
                .then(response => {
                    if (response.status === 200) {
                        this.member = response.data
                        this.balance = this.member.account.balance
                        this.restricted = this.member.account.restricted
                        this.inreview = this.member.account.inreview
                        this.pending = this.member.account.pending
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
</script>