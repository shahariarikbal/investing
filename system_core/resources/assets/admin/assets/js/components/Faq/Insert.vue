<!--<template>-->
<!--    <div>-->

<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    import { VueEditor, Quill } from "vue2-editor";-->
<!--    export default {-->
<!--        data() {-->
<!--            return {-->
<!--                service: '',-->
<!--                question: '',-->
<!--                answer: '',-->
<!--                errorCount: 0,-->
<!--                serviceError: '',-->
<!--                questionError: '',-->
<!--                answerError: '',-->
<!--                -->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            resetError () {-->
<!--                this.errorCount = 0-->
<!--                this.serviceError =''-->
<!--                this.questionError = ''-->
<!--                this.answerError = ''-->
<!--            },-->
<!--            save () {-->
<!--                this.resetError()-->

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

<!--                axios.post('/admin/faq/save', {-->
<!--                    service: this.service,-->
<!--                    question: this.question,-->
<!--                    answer: this.answer,-->
<!--                   -->
<!--                })-->
<!--                .then((response) => {-->
<!--                    if (response.status === 201) {-->
<!--                        this.service = '',-->
<!--                        this.question = '',-->
<!--                        this.answer = '',-->
<!--                        $('.addFaqModal').modal('hide')-->
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
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->