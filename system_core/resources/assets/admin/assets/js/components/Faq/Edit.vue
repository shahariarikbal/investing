<!--<template>-->
<!--    <div>-->
<!--&lt;!&ndash;        <div class="modal fade editFaqModal" tabindex="-1" role="dialog" ref="editFaqModal" aria-labelledby="myLargeModalLabel" aria-hidden="true">&ndash;&gt;-->
<!--&lt;!&ndash;            <div class="modal-dialog modal-lg">&ndash;&gt;-->
<!--&lt;!&ndash;                <div class="modal-content">&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="modal-header">&ndash;&gt;-->
<!--&lt;!&ndash;                        <h2>Edit Faq</h2>&ndash;&gt;-->
<!--&lt;!&ndash;                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&ndash;&gt;-->
<!--&lt;!&ndash;                            <span aria-hidden="true">&times;</span>&ndash;&gt;-->
<!--&lt;!&ndash;                        </button>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                    <div class="card-body m-t-35">&ndash;&gt;-->
<!--&lt;!&ndash;                        <form name="faq" method="post" class="form-horizontal login_validator" id="form_inline_validator">&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="form-group row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-xl-3 text-xl-right">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="service" class="col-form-label">Service *</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-xl-9">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <select class="form-control chzn-select" name="service" id="service" tabindex="2" v-model="service">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option disabled selected>Choose Your Service</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="App\General">General - Faq</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="App\Signal">Forex - SignalFaq</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="App\Copytrade">Copy - Trade</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <option value="App\FundManagement">Fund - Management</option>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </select>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <small class="text-danger" v-text="serviceError"></small>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="form-group row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-xl-3 text-xl-right">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="question" class="col-form-label">Question *</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-xl-9">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <input type="text" id="question" name="question" v-model="question" placeholder="Enter Your Faq Question...." class="form-control">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <small class="text-danger" v-text="questionError"></small>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="form-group row">&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-xl-3 text-xl-right">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <label for="answer" class="col-form-label">Answer *</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                <div class="col-xl-9">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <textarea type="text" id="answer" row="5" name="answer" v-model="answer" placeholder="Enter Your Faq Answer...." class="form-control"></textarea>&ndash;&gt;-->
<!--&lt;!&ndash;                                    <small class="text-danger" v-text="answerError"></small>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                            <div class="modal-footer">&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&ndash;&gt;-->
<!--&lt;!&ndash;                                <button type="button" class="btn btn-primary" @click="update()">Update</button>&ndash;&gt;-->
<!--&lt;!&ndash;                            </div>&ndash;&gt;-->
<!--&lt;!&ndash;                        </form>&ndash;&gt;-->
<!--&lt;!&ndash;                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                </div>&ndash;&gt;-->
<!--&lt;!&ndash;            </div>&ndash;&gt;-->
<!--&lt;!&ndash;        </div>&ndash;&gt;-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->
<!--        props: ['id'],-->
<!--        data() {-->
<!--            return {-->
<!--                service: '',-->
<!--                question: '',-->
<!--                answer: '',-->
<!--                errorCount: 0,-->
<!--                serviceError: '',-->
<!--                questionError: '',-->
<!--                answerError: '',-->
<!--                id: '',-->
<!--                -->
<!--            }-->
<!--        },-->

<!--        mounted (){-->
<!--            EventBus.$on('faq-edit-data-fetch', (payload) => {-->
<!--                this.id = payload-->
<!--                axios.get('edit/'+payload)-->
<!--                    .then(response => {-->
<!--                        var faqs = response.data-->
<!--                        this.service = faqs.service-->
<!--                        this.question = faqs.question-->
<!--                        this.answer = faqs.answer-->
<!--                        console.log(response.data)-->
<!--                    })-->
<!--                    .catch((error) => {-->
<!--                        console.log(error)-->
<!--                    })-->
<!--            })-->
<!--            -->
<!--        },-->
<!--        methods: {-->
<!--            resetError () {-->
<!--                this.errorCount = 0-->
<!--                this.serviceError =''-->
<!--                this.questionError = ''-->
<!--                this.answerError = ''-->
<!--            },-->
<!--            update () {-->
<!--                this.resetError()-->
<!--                axios.post('update/'+this.id, {-->
<!--                    service: this.service,-->
<!--                    question: this.question,-->
<!--                    answer: this.answer,-->
<!--                })-->
<!--                    .then((response) => {-->
<!--                    if (response.status === 200) {-->
<!--                        this.service = '',-->
<!--                        this.question = '',-->
<!--                        this.answer = '',-->
<!--                        $('.editFaqModal').modal('hide')-->
<!--                        location.reload(true);-->
<!--                        // this.$refs.addFaqModal.setAttribute('style', 'display: none')-->
<!--                    } else {-->
<!--                        alert('Something went wrong!')-->
<!--                    }-->
<!--                    -->
<!--                })-->
<!--                .catch((error) => {-->
<!--                    console.log(error)-->
<!--                })-->
<!--                // validation-->
<!--                // check service length-->
<!--                if (this.service.length === 0) {-->
<!--                    this.serviceError = 'Service field is required'-->
<!--                    this.errorCount++-->
<!--                }-->

<!--                // validation-->
<!--                // check question length-->
<!--                if (this.question.length === 0) {-->
<!--                    this.questionError = 'Question field is required'-->
<!--                    this.errorCount++-->
<!--                }-->

<!--                // validation-->
<!--                // check answer length-->
<!--                if (this.answer.length === 0) {-->
<!--                    this.answerError = 'Answer field is required'-->
<!--                    this.errorCount++-->
<!--                }-->

<!--                -->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->