<template>
    <div class="modal fade" id="balance-modal" role="dialog" aria-labelledby="modalLabelprimary">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white" id="modalLabelprimary">Deposit Requests</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Balance</th>
                                <th>Restricted</th>
                                <th>Inreview</th>
                                <th>Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ this.member.username }}</td>
                                <td>{{ this.balance | currency }}</td>
                                <td>{{ this.restricted | currency }}</td>
                                <td>{{ this.inreview | currency }}</td>
                                <td>{{ this.pending | currency }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn  btn-primary" data-dismiss="modal">Close me!</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [ 'subscription' ],
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
            axios.get('/xhr/admin/subscriptions/' + this.subscription.id + '/balance')
                .then(response => {
                    this.member = response.data.member
                    this.balance = this.member.account.balance
                    this.restricted = this.member.account.restricted
                    this.inreview = this.member.account.inreview
                    this.pending = this.member.account.pending
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
</script>