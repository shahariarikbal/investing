<template>
    <div class="page col-xl-9 col-lg-9 col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>User Graph Tree</h2>
            </div>
            <div class="card-body">
                <organization-chart :datasource="usertree"></organization-chart>
            </div>
        </div>
        
    </div>
</template>

<script>

  import OrganizationChart from 'vue-organization-chart'
  import 'vue-organization-chart/dist/orgchart.css'

export default {
    components: {
      OrganizationChart
    },
    data () {
        return {
            usertree: {}
        }
    },
    created () {
        this.getUserGraph()
    },
    computed: {

    },
    methods: {
        getUserGraph() {
            axios.get('/api/member/affiliate/user-graph')
                .then(res=>{
                    this.usertree = this.rename(res.data[0])//this.refit_keys()
                })
        },
        rename(o){
            o.name = o.username;
            o.title = o.full_name

            if ( typeof o.children !== 'undefined' && o.children.length) {
               o.children = o.children.map(u => this.rename(u))
            }

            
            return o;
        }
    }
}
</script>