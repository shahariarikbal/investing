<template>
    <div style="background: #fff; margin-top: 5px" id="new-reply">
        <div id="loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>

        <a style="margin-left: 10px;margin-top: 8px;" href="#" @click="displayReplyForm = true" v-if="displayReplyForm === false"><i class="fas fa-reply"></i> Reply</a>
        <a style="margin-right: 10px;margin-top: 8px;" href="#" @click="displayReplyForm = false" class="float-right" v-if="displayReplyForm">Close <i class="fas fa-angle-double-up"></i></a>
        
        <form action="" v-if="displayReplyForm" >
            <div class="form-group">
                <label style="margin-top: 10px; margin-left: 20px;">Message</label>
                <vue-editor v-model="message" :editor-toolbar="customToolbar" />
                <small :class="messageErrorClass" v-text="messageError"></small>
            </div>
            <div class="form-group">
                <label style="margin-top: 10px; margin-left: 20px;">Attachment (Allowed JPEG, PNG and PDF only)</label>
                <input type="file" ref="attachment" />
                <small :class="attachmentErrorClass" v-text="attachmentError"></small>
            </div>
            <a href="#" style="margin-top: 10px; margin-left: 20px; margin-bottom: 20px" class="btn btn-info btn-sm" @click="reply">Submit Reply</a>
        </form>
    </div>
</template>

<script>
    
    import { VueEditor, Quill } from "vue2-editor";
    export default {
        props: [ 'ticketId' ],
        data() {
            return {
                displayReplyForm: false,
                customToolbar: [
                    ["bold", "italic", "underline"],
                    [{ list: "ordered" }, { list: "bullet" }],
                    ["code-block"]
                ],
                message: '',

                messageError: '',
                attachmentError: '',
                error: 0
            }
        },
        components: { VueEditor, Quill },
        computed: {
            messageErrorClass () {
                if (this.messageError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            },
            attachmentErrorClass () {
                if (this.attachmentError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            }
        },
        methods: {
            resetError () {
                this.messageError = ''
                this.attachmentError = ''
                this.error = 0
            },
            validate () {
                if (this.message.length === 0) {
                    this.messageError = 'Message field required'
                    this.error++
                }
            },
            reply() {
                this.resetError()
                this.validate()

                if (this.error === 0) {
                    let height = parseInt(document.getElementById('new-reply').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('loading').setAttribute('style', loadingStyle)

                    let data =  new FormData()

                    data.append('message', this.message)
                    if(this.$refs.attachment.files[0] !== undefined) {
                        let file = this.$refs.attachment.files[0]
                        data.append('attachment', file)
                    }

                    let settings = { headers: { 'content-type': 'multipart/form-data' } }

                    axios.post(`/api/member/support-ticket/${this.ticketId}/reply`, data, settings)
                        .then(response => {
                            if (response.status === 201) {
                                document.getElementById('loading').setAttribute('style', 'display: none')
                                this.message = ''
                                EventBus.$emit(`reply-created`, response.data)
                                this.displayReplyForm = false
                            }
                        })
                        .catch(error => {
                            console.log(error)
                            document.getElementById('loading').setAttribute('style', 'display: none')
                            if (error.response && error.response.status === 422) {
                                if (error.response.data.attachment) {
                                    this.attachmentError = error.response.data.attachment[0]
                                }
                                if (error.response.data.message) {
                                    this.messageError = error.response.data.message[0]
                                }
                            }
                        })
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .invalid-feedback.invalid-feedback-show {
        display: block;
    }
</style>