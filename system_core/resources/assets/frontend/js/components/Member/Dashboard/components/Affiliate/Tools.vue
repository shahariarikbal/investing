<template>
    <div class="page col-xl-9 col-lg-9 col-md-12">
        <div class="drop-shadow">
                <div class="row">
                  <div class="col-md-12 affiliate-banner-title">
                    <h4>Link to us</h4>
                  </div>
                  <div class="col-md-12" v-for="(t, i) in template" :key="i">
                    <div class="affiliate-banner">
                      
                        <div class="banner m-3" :ref="i" v-bind="appendScript(t, i)"></div>
                      <div>
                          <div class="float-right">
                            <a href="#" class="badge badge-secondary p-2 font-weight-400 mb-1" @click.prevent="copyScript(t, i)">COPY</a>
                          </div>
                        </div>
                      <div>
                        <textarea rows="4" class="form-control" :value="scriptCode(t, i)" :ref="`textarea-${i}`" />
                      </div>
                    </div>
                  </div>
   
                </div>
              </div>
    </div>
</template>

<script>
import postscribe from 'postscribe';

export default {
    data () {
        return {
            user : InvestingPartner.auth,
            template: []
        }
    },
    created () {
       this.gettemplate(); 
    },
    computed: {

    },
    methods: {
        gettemplate() {
            axios.get('/api/member/affiliate/templates')
                .then(res => {
                    this.template = res.data;
                })
        },
        scriptCode(banner, i) {
            return `
                <script type="text/javascript" src="${InvestingPartner.app_url}/affiliate.js?w=${banner.width}&amp;h=${banner.height}&amp;r=${this.user.username}&amp;t=${i}"><\/script><noscript><h2><a href="${InvestingPartner.app_url}?ref=${this.user.username}" title="Investing Partner" rel=”nofollow” >Investing Partner</a></h2></noscript>
            `
        },
        appendScript (banner, i) {
            setTimeout(()=> {
                postscribe(this.$refs[i][0], `<script type="text/javascript" src="${InvestingPartner.app_url}/affiliate.js?w=${banner.width}&h=${banner.height}&r=${this.user.username}&t=${i}"><\/script>`);
            }, 1000)
        },
        copyScript (banner, i) {
            var el = this.$refs[`textarea-${i}`][0]
            el.select();

            /* Copy the text inside the text field */
            document.execCommand("copy");
        }

    }
}
</script>