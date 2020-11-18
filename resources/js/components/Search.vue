<template>
    <div>
        <input class="form-control rounded-0" :class="inputClasses" type="text" :placeholder="placeholderText" v-model="keyword" @keyup="$emit('search', keyword)">
    </div>
</template>

<script>
export default {
    props: {
        inputClasses: Array,
        placeholder: String
    },

    data () {
        return {
            placeholderText: 'Search...',
            keyword: '',
        }
    },

    created () {
        if (this.placeholder) {
            this.placeholderText = this.placeholder;
        }
    },

    methods: {
        reset() {
            this.keyword = '';
        }
    }
}
</script>