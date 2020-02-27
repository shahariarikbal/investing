<template>
    <div class="reviews-warp">
        
        <div class="card">
            <div class="card-header">
                Broker Reviews
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" :class="{'active': activeTab == 'pending'}" @click.prevent="activeTab = 'pending'">Pending</a>
                            
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :class="{'active': activeTab == 'published'}" @click.prevent="activeTab = 'published'">Published</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :class="{'active': activeTab == 'canceled'}" @click.prevent="activeTab = 'canceled'">Canceled</a>
                    </li>
                </ul>

            </div>
            <div class="card-body">
                <Reviews :status="activeTab" />
            </div>
        </div>
            
        
    </div>
</template>

<script>
import Reviews from './Reviews';
export default {
    components: {
        Reviews
    },
    data () {
        return {
            activeTab: 'pending'
        }
    },
    created () {
        
    },
    computed: {

    },
    methods: {
    }
}
</script>