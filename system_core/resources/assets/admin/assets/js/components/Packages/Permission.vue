<template>
    <div>
        <label style="display: block;">
            <input class="checkbox-away" type="checkbox" @change="$emit('input', !permission.checked)" :checked="permission.checked" />
            <span> {{ permission.name }}</span>
        </label>
    </div>
</template>

<script>
    export default {
        props: [ 'value', 'permission'],
        watch: {
            value (val) {
                if (this.permission.checked !== val) {
                    this.permission.checked = val
                    this.$emit('input', this.permission.checked);
                }
            }
        },
        methods: {
            addPermission () {
                this.permission.checked = !this.permission.checked;

                this.$emit('input', this.permission.checked);
            }
        }
    }
</script>