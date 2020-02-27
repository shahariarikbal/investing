<template>
    <div>
        <a href="#" @click="active(type)" :aria-controls="type" role="tab" data-toggle="tab" :class="{'nav-link withoutripple show active': (type == 'active'),  
           'nav-link withoutripple': (type != 'active') }">
           	 <span class="d-none d-md-inline text-uppercase">{{ type }} <span v-if="newSignalCount" class="badge badge-pill badge-danger" v-text="newSignalCount"></span></span>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['type', 'newSignalCount'],
		methods: {
			active(type) {
				this.$emit('active', type)
			}
		}
    }
</script>