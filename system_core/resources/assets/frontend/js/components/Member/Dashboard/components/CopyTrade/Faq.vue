<template>
    <div class="row">
        <div class="col-md-12">
            <div class="title-container">
                <h2 class="forex-header-second" style="font-size: 18px;"><span>faq</span></h2>
            </div>
        </div>

        <template v-if="faqs.length > 0">
            <div class="col-lg-6 col-md-6" v-for="(faq, index) in faqs" :key="index">
                <div :id="`accordion_${index}`" class="faq_content">
                    <div style="background-color: inherit;" class="card" v-for="(each, key) in faq" :key="key">
                        <div class="card-header" :id="`heading_${key}`">
                            <h6 class="mb-0">
                                <a style="background: #212529;" class="collapsed" data-toggle="collapse" :href="`#collapse_${key}`" aria-expanded="false" :aria-controls="`collapse_${key}`" v-text="each.question"></a>
                            </h6>
                        </div>
                        <div :id="`collapse_${key}`" class="collapse" :aria-labelledby="`heading_${key}`" :data-parent="`#accordion_${index}`">
                            <div style="border: 1px solid #ccc;" class="card-body" v-text="each.answer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <div v-else class="col-md-12">
            <div class="alert alert-warning" role="alert">No faq found</div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                faqs: []
            }
        },
        created () {
            this.getFaqs()
        },
        methods: {
            getFaqs () {
                axios.post('/api/member/copy-trade/faq')
                    .then(response => {
                        this.faqs = response.data
                    })
                    .catch(error => {
                        if ([500, 503, 504].find((error_code) => { return error_code === error.response.status }) !== undefined) {
                            setTimeout(() => { 
                                this.getFaqs()
                            }, 5000);
                        }
                        console.log(error)
                    })
            }
        }
    }
</script>
