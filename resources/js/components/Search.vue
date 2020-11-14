<template>
    <div>
        <input class="form-control px-2 py-4 rounded-0" type="text" placeholder="Type something to search..." v-model="keyword" @keyup="$emit('search', keyword)">
    </div>
</template>

<script>
export default {
    data () {
        return {
            keyword: '',
        }
    },

    methods: {
        resetInput() {
            this.keyword = '';
        }
    }
}
</script>