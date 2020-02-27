<template>
    <div class="page col-xl-9 col-lg-9 col-md-12">
        <div class="drop-shadow">
                <div class="row">
                  <div class="col-md-12">
                    <div class="affiliate-heading">
                      <div>
                          <h3>affiliates</h3>
                      </div>
                      <div>
                        <span>These statistics are in real time and update instantly</span>
                      </div>
                    </div>
                 </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <div class="affiliate-contdown alert-warning">
                        <div>
                            <i class="fas fa-users fa-4x"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                          <div><span class="number">121</span></div>
                          <div><span>Clicks</span></div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="affiliate-contdown alert-info">
                        <div>
                            <i class="fas fa-shopping-cart fa-4x"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                          <div><span class="number">{{ total_singup }}</span></div>
                          <div><span>Signups</span></div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="affiliate-contdown alert-success">
                        <div>
                            <i class="fas fa-chart-bar fa-4x"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                          <div><span class="number">{{ total_earn | currency }}</span></div>
                          <div><span>Total Earn</span></div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12 p-5">
                      <div class="text-center alert alert-success">
                        <div>
                            <p>your unique referral link</p>
                        </div>

                        <input type="text" readonly class="form-control-plaintext text-center" @click.prevent="$event.target.select()" :value="getRefferelLink">
                        
                      </div>
                   </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Earn Log</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-sm referall-listing-table table-bordered" v-if="transections.length">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Lavel</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">Bill</th>
                                        <th scope="col">Your Earn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="t in transections" :key="t.id">
                                        <td>{{ t.meta.member_name }}</td>
                                        <td>{{ t.meta.affiliate_lavel }}</td>
                                        <td>{{ t.meta.service.split('\\')[t.meta.service.split('\\').length - 1] }}</td>
                                        <td>{{ t.meta.amount }}</td>
                                        <td>{{ t.amount | currency }} ({{ t.meta.affiliate_percentage }}%)</td>

                                    </tr>
                                    
                                    </tbody>
                                </table>

                                <div class="text-center alert alert-success" v-else>
                                    No Earning log found.                                    
                                </div>

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            user : InvestingPartner.auth,
            transections: [],
            total_singup: 0,
            total_earn: 0
        }
    },
    created () {
        this.getAffiliateTransection()
    },
    computed: {
        getRefferelLink () {
            return window.location.origin + `?ref=${this.user.username}`
        }
    },
    methods: {
        getAffiliateTransection() {
            axios.get('/api/member/affiliate/transections')
                .then(res=> {
                    this.transections = res.data.transections;
                    this.total_singup = res.data.total_singup
                    this.total_earn = res.data.total_earn
                })
        }
    }
}
</script>