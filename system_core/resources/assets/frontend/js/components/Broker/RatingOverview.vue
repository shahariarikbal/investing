<template>
    <div class="card">
                                    <div class="row">
                                       <div class="col-md-4 average-rating-info">
                                          <div class="text-center">
                                             <h2 class="text-uppercase">broker rating</h2>
                                          </div>
                                          <div class="text-center"><span class="result">{{brokerAvgRating}}</span></div>
                                          <div class="text-center"><span>Avarage Rating</span>
                                              <star-rating :rating="brokerAvgRating" :increment="0.01" :fixed-points="2" read-only :show-rating="false" style="justify-content:center"/>
                                          </div>
                                       </div>
                                       <div class="col-md-4 progress-area">
                                          <div class="progress">
                                             <div role="progressbar" aria-valuenow="%" aria-valuemin="0" aria-valuemax="100" class="progress-bar rating-bar" :style="{width: avg5Rating+ '%'}">
                                                {{count5Rating}} </div>
                                          </div>
                                          <div class="progress">
                                             <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-success progress-bar-success rating-bar" :style="{width: avg4Rating+ '%'}">
                                                {{count4Rating}} </div>
                                          </div>
                                          <div class="progress">
                                             <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-info rating-bar" :style="{width: avg3Rating+ '%'}">
                                               {{count3Rating}} </div>
                                          </div>
                                          <div class="progress">
                                             <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-warning" :style="{width: avg2Rating+ '%'}">
                                                {{count2Rating}} </div>
                                          </div>
                                          <div class="progress">
                                             <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-danger rating-bar" :style="{width: avg1Rating+ '%'}">
                                                {{count1Rating}} </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 rating-area">
                                          <div class="rating d-flex">
                                                <star-rating :rating="5" read-only :star-size="12" :show-rating="false"/>
                                                <strong class="ml-2">  {{avg5Rating}}%</strong>
                                             
                                          </div>
                                          <div class="rating d-flex">
                                                <star-rating :rating="4" read-only :star-size="12" :show-rating="false"/>
                                                <strong class="ml-2">  {{avg4Rating}}%</strong>
                                             
                                          </div>
                                          <div class="rating d-flex">
                                                <star-rating :rating="3" read-only :star-size="12" :show-rating="false"/>
                                                <strong class="ml-2">  {{avg3Rating}}%</strong>
                                             
                                          </div>
                                          <div class="rating d-flex">
                                                <star-rating :rating="2" read-only :star-size="12" :show-rating="false"/>
                                                <strong class="ml-2">  {{avg2Rating}}%</strong>
                                             
                                          </div>
                                          <div class="rating d-flex">
                                                <star-rating :rating="1" read-only :star-size="12" :show-rating="false"/>
                                                <strong class="ml-2">  {{avg1Rating}}%</strong>
                                             
                                          </div>
                                       </div>
                                    </div>
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
            required:true
        }
    },
    computed: {
        brokerAvgRating(){
            return this.broker.rating_avg;
        },
        totalRating() {
            return this.broker.ratings_count;
        },
        count5Rating() {
            return this.broker.published_ratings.filter(r=> parseInt(r.value) === 5).length
        },
        count4Rating() {
            return this.broker.published_ratings.filter(r=> parseInt(r.value) === 4).length
        },
        count3Rating() {
            return this.broker.published_ratings.filter(r=> parseInt(r.value) === 3).length
        },
        count2Rating() {
            return this.broker.published_ratings.filter(r=> parseInt(r.value) === 2).length
        },
        count1Rating() {
            return this.broker.published_ratings.filter(r=> parseInt(r.value) === 1).length
        },
        avg5Rating() {
            return ((this.count5Rating || 0)/this.totalRating) *100
        },
        avg4Rating() {
            return ((this.count4Rating || 0)/this.totalRating) *100
        },
        avg3Rating() {
            return ((this.count3Rating || 0)/this.totalRating) *100
        },
        avg2Rating() {
            return ((this.count2Rating || 0)/this.totalRating) *100
        },
        avg1Rating() {
            return ((this.count1Rating || 0)/this.totalRating) *100
        }

    },
    methods: {

    }
}
</script>