<template>
    <div>
        <div class="inner" style="background: #fff; margin-top: 5px">
            <div class="details reply-body">
                <div class="row">
                    <div class="col" style="border-right: 1px solid #ddd;">
                        <div><img :src="avater" alt=""></div>
                        <div><span v-text="fullname"></span></div>
                        <div><span v-text="createdAt"></span></div>
                    </div>
                    <div class="col-9 issue-body">
                        <div v-html="reply.message"></div>
                        <div v-if="reply.attachment">
                            <h6>Attachment <i class="fas fa-paperclip"></i></h6>
                            <a :href="attachment" target="_blank">{{ reply.attachment }}</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        props: [ 'data' ],
        data () {
            return {
                reply: this.data
            }
        },
        computed: {
            avater () {
                if (this.reply.member) {
                    return `${this.reply.member.avater_path}/50x50-${this.reply.member.avater}`
                }
                return `${InvestingPartner.app_url}/storage/user/50x50-investing-partner.png`
            },
            fullname () {
                if (this.reply.member) {
                    return this.reply.member.full_name
                }
                return this.reply.admin.full_name
            },
            attachment () {
                return this.reply.attachment ? `${InvestingPartner.app_url}/storage/support-ticket/${this.reply.attachment}` : null
            },
            createdAt () {
                return moment(this.reply.created_at).format("MMM Do YYYY, h:mm:ss a")
            }
        }
    }
</script>

<style lang="scss" scoped>
    .reply-body {
        padding: 10px 15px;
    }
</style>