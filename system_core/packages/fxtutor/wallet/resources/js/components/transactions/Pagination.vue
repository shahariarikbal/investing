<template>
    <div class="pagination-wrapper">
        <div>
            <span>Showing {{ meta.from }} to {{ meta.to }} of {{ meta.total }} entries</span>
        </div>
        <div>
            <ul class="pagination navigation justify-content-end mb-0">
                <li
                    class="page-item"
                    :class="{'disabled': !hasPrevious}"
                >
                    <a
                        class="page-link"
                        href="#"
                        aria-label="Previous"
                        @click.prevent="changePage(meta.current_page-1)"
                    >
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li
                    v-for="p in meta.last_page"
                    :key="p"
                    :class="{'active': p == meta.current_page}"
                    class="page-item"
                >
                    <a
                        class="page-link"
                        href="#"
                        @click.prevent="changePage(p)"
                    >{{ p }}</a>
                </li>

                <li
                    class="page-item"
                    :class="{'disabled': !hasNext}"
                >
                    <a
                        class="page-link"
                        href="#"
                        aria-label="Next"
                        @click.prevent="changePage(meta.current_page+1)"
                    >
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        meta: {
            type: Object,
            required: true
        }
    },
    data () {
        return {

        }
    },
    computed: {
        hasPrevious () {
            return this.meta.current_page > 1
        },
        hasNext () {
            return this.meta.current_page < this.meta.last_page
        }
    },
    created () {

    },
    methods: {
        changePage (page) {
            this.$emit('input', page)
        }
    }
}
</script>
