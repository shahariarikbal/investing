<template>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <div class="title-container">
                    <h2 class="forex-header-second" style="font-size: 18px;"><span>fund management shoutbox</span></h2>
                </div>
            </div>
            <div class="col-md-12">

                <div class="scrollBoxFundManagement pt-3" v-if="shouts.length > 0">
                    <ul>
                        <li v-for="(shout, index) in shouts" :key="index">
                            <div class="accordion" :id="`accordion_${index}`">
                                <div :id="`heading_${index}`">
                                    <div data-toggle="collapse" :data-target="`#collaps_${index}`" aria-expanded="true" :aria-controls="`collaps_${index}`" class="d-flex flex-column pointer">
                                        <div>
                                            <p v-text="shout.title"></p>
                                        </div>
                                        <div>
                                            <span class="text-success"><small><prity-date :date="shout.updated_at" /></small></span>
                                            <span class="ml-1 text-muted"><i class="fas fa-angle-down fa-lg"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div :id="`collaps_${index}`" class="collapse" :aria-labelledby="`heading_${index}`" :data-parent="`#accordion_${index}`">
                                    <p class="p-2 m-1" style="background-color:#e2e3e5;" v-text="shout.description"></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div v-else class="alert alert-warning" role="alert">No Shout Found</div>

            </div>
        </div>
    </div>
</template>

<script>
    import PrityDate from './../../../../Time/PrityDate.vue'
    export default {
        data () {
            return {
                shouts: []
            }
        },
        components: {
            PrityDate
        },
        created () {
            this.getShouts()
        },
        methods: {
            getShouts () {
                axios.post('/api/member/fund-management/shouts')
                    .then(response => {
                        this.shouts = response.data
                    })
                    .catch(error => {
                        if ([500, 503, 504].find((error_code) => { return error_code === error.response.status }) !== undefined) {
                            setTimeout(() => { 
                                this.getShouts()
                            }, 5000);
                        }
                        console.log(error)
                    })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .scrollBoxFundManagement{
      height:455px;
      background-color:#fff;
      overflow:hidden;
      border-radius: 4px;
    }
    .scrollBoxFundManagement ul{
      list-style:none;
      position:relative;
      margin:0;
      padding: 0;
    }
    .scrollBoxFundManagement ul li{
      border-bottom:1px solid #ddd;
      margin:0 0 5px 0;
      padding: 0.5rem 0.3rem;
    }
    .scrollBoxFundManagement ul li p {
      font-size: 0.9rem;;
      font-weight: 400;
      color: #4C4C4C;
      margin-bottom: 5px;
    }
    .scrollBoxFundManagement ul li:last-child {
      border-bottom: none;
    }
</style>