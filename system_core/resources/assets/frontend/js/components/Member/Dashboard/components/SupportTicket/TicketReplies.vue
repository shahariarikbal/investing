<template>
    <div>
        <new-reply :ticketId="ticketId" />
        
        <reply v-for="reply in replies" :key="reply.id" :data="reply" />
    </div>
</template>

<script>
    import NewReply from './NewReply'
    import Reply from './TicketReply'
    export default {
        props: [ 'replies', 'ticketId' ],
        // data() {
        //     return {
        //         repliesData: this.replies
        //     }
        // },
        components: { NewReply, Reply  },
        // created () {
        //     EventBus.$on(`reply-created-${this.ticketId}`, payload => {
        //         console.log('new reply')
        //         // this.repliesData.push(payload)
        //     })
        // }
    }
</script>