<template>
    <div style="position: relative; margin-bottom: 100px; margin-top: 50px" id="new-support-ticket">
        <div id="loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <h3>New Ticket</h3>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>name</label>
                    <input type="name" class="form-control" v-model="full_name" readonly />
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="email" readonly />
                </div>
            </div>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" placeholder="Input subject here" v-model="subject" />
                <small :class="subjectErrorClass" v-text="subjectError"></small>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Department</label>
                    <select class="form-control" v-model="department">
                        <option selected>Choose...</option>
                        <option v-for="department in departments" :value="department.id" :key="department.id" v-text="department.name"></option>
                    </select>
                    <small :class="departmentErrorClass" v-text="departmentError"></small>
                </div>
                <div class="form-group col-md-6">
                    <label>Severity</label>
                    <select class="form-control" v-model="severity">
                        <option selected>Choose...</option>
                        <option value="general">General</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    <small :class="severityErrorClass" v-text="severityError"></small>
                </div>
            </div>
            <div class="form-group">
                <label>Message</label>
                <vue-editor v-model="message" :editor-toolbar="customToolbar" />
                <small :class="messageErrorClass" v-text="messageError"></small>
            </div>
            <div class="form-group">
                <label>Attachment (Allowed JPEG, PNG and PDF only)</label>
                <input type="file" ref="attachment" />
                <small :class="attachmentErrorClass" v-text="attachmentError"></small>
            </div>
            <a href="#" class="btn btn-info btn-sm" @click="create">Create Ticket</a>
            <a href="#" class="btn btn-info btn-sm float-right" @click="backToList">Close</a>
        </form>
    </div>
</template>

<script>
// // Basic Use - Covers most scenarios
// import { VueEditor } from "vue2-editor";

// Advanced Use - Hook into Quill's API for Custom Functionality
    import { VueEditor, Quill } from "vue2-editor";
    export default {
        data() {
            return {
                departments: [],
                customToolbar: [
                    ["bold", "italic", "underline"],
                    [{ list: "ordered" }, { list: "bullet" }],
                    ["code-block"]
                ],
                subject: '',
                department: '',
                severity: '',
                message: '',

                subjectError: '',
                departmentError: '',
                severityError: '',
                messageError: '',
                attachmentError: '',
                error: 0
            }
        },
        computed: {
            full_name () {
                return InvestingPartner.auth.full_name  
            },
            email () {
                return InvestingPartner.auth.email
            },
            subjectErrorClass() {
                if (this.subjectError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            },
            departmentErrorClass() {
                if (this.departmentError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            },
            severityErrorClass() {
                if (this.severityError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            },
            messageErrorClass() {
                if (this.messageError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            },
            attachmentErrorClass() {
                if (this.attachmentError.length > 0) {
                    return 'invalid-feedback invalid-feedback-show'
                }
                return 'invalid-feedback'
            }
        },
        components: { VueEditor, Quill },
        created () {
            this.getDepartment()
        },
        methods: {
            resetError () {
                this.subjectError = '',
                this.departmentError = '',
                this.severityError = '',
                this.messageError = '',
                this.attachmentError = '',
                this.error = 0 
            },
            validate () {
                if (this.subject.length === 0) {
                    this.subjectError = 'Subject field required'
                    this.error++
                }

                if (this.department.length === 0) {
                    this.departmentError = 'Department field required'
                    this.error++
                }

                if (this.severity.length === 0) {
                    this.severityError = 'Severity field required'
                    this.error++
                }

                if (this.message.length === 0) {
                    this.messageError = 'Message field required'
                    this.error++
                }
            },
            getDepartment () {
                axios.post('/api/support-departments')
                    .then(response => {
                        this.departments = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            create () {

                this.resetError()
                this.validate()

                if (this.error === 0) {

                    let height = parseInt(document.getElementById('new-support-ticket').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('loading').setAttribute('style', loadingStyle)

                    let data =  new FormData()

                    data.append('subject', this.subject)
                    data.append('department', this.department)
                    data.append('severity', this.severity)
                    data.append('message', this.message)

                    if(this.$refs.attachment.files[0] !== undefined) {
                        let file = this.$refs.attachment.files[0]
                        data.append('attachment', file)
                    }

                    let settings = { headers: { 'content-type': 'multipart/form-data' } }

                    axios.post('/api/member/support-ticket/create', data, settings)
                        .then(response => {
                            if (response.status === 201) {
                                document.getElementById('loading').setAttribute('style', 'display: none')
                                EventBus.$emit('ticket-created', response.data)
                                this.backToList()
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
                                if (error.response.data.department) {
                                    this.departmentError = error.response.data.department[0]
                                }
                                if (error.response.data.severity) {
                                    this.severityError = error.response.data.severity[0]
                                }
                                if (error.response.data.subject) {
                                    this.subjectError = error.response.data.subject[0]
                                }
                            }
                        })
                }
                
            },
            backToList () {
                this.$router.push({ name: 'support-tickets' })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .invalid-feedback.invalid-feedback-show {
        display: block;
    }
</style>