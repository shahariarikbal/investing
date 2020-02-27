<template>
    <span v-if="mini" class="ml-auto badge badge-dark">
        <slot v-if="days > 0" :days="days">{{days}} days ago</slot>
        <slot v-if="days === 0 && hours > 0" :hours="hours">{{hours}} hrs ago</slot>
        <slot v-if="days === 0 && hours === 0 && minutes > 0" :minutes="minutes">{{ minutes}} mins ago</slot>
        <slot v-if="days === 0 && hours === 0 && minutes === 0 && seconds > 0" :seconds="seconds">{{ seconds}} seconds ago</slot>
    </span>
    <span v-else>
        <slot v-if="days > 0" :days="days" :hours="hours" :minutes="minutes" :seconds="seconds">{{days}} days {{hours}} hrs {{ minutes}} mins ago</slot>
        <slot v-if="days === 0 && hours > 0" :hours="hours" :minutes="minutes" :seconds="seconds">{{hours}} hrs {{ minutes}} mins ago</slot>
        <slot v-if="days === 0 && hours === 0 && minutes > 0" :minutes="minutes" :seconds="seconds">{{ minutes}} mins ago</slot>
        <slot v-if="days === 0 && hours === 0 && minutes === 0 && seconds > 0" :seconds="seconds">{{ seconds}} seconds ago</slot>
    </span>
</template>

<script>
export default {
    data() {
      return {
        interval:null,
        days:0,
        hours:0,
        minutes:0,
        seconds:0,
        intervals:{
          second: 1000,
          minute: 1000 * 60,
          hour: 1000 * 60 * 60,
          day: 1000 * 60 * 60 * 24
        }
      }
    },
    props:{
      date:{
        required:true
      },
      autoUpdate: {
        type: Number,
        default: 1
      },
      mini: {
        type: Boolean,
        default: false
      }
    },
    mounted() {
      this.interval = setInterval(() => {
        this.updateDiffs();
      }, this.autoUpdate * 1000);
      
      this.updateDiffs();
    },
    destroyed() {
      clearInterval(this.interval);    
    },
    methods:{
      updateDiffs() {
        //lets figure out our diffs
        let diff = Math.abs(Date.now() - new Date(this.date));
        this.days = Math.floor(diff / this.intervals.day);
        diff -= this.days * this.intervals.day;
        this.hours = Math.floor(diff / this.intervals.hour);
        diff -= this.hours * this.intervals.hour;
        this.minutes = Math.floor(diff / this.intervals.minute);
        diff -= this.minutes * this.intervals.minute;
        this.seconds = Math.floor(diff / this.intervals.second);
      }
    }
}
</script>