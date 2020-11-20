<template>
    <div class="position-relative">
        <input class="form-control rounded-0" type="text"
            :class="inputClasses" 
            :placeholder="placeholderText" 
            v-model="keyword" 
            @keyup="$emit('search', keyword)"
        >
        <i v-if="searchButton" class="fas fa-search search-button" 
            @click="$emit('search-clicked', keyword)">
        </i>
    </div>
</template>

<script>
export default {
    props: {
        inputClasses: Array,
        placeholder: String,
        useButton: Boolean
    },

    data () {
        return {
            placeholderText: 'Search...',
            searchButton: false,
            keyword: '',
        }
    },

    created () {
        if (this.placeholder) {
            this.placeholderText = this.placeholder;
        }

        this.searchButton = this.useButton;
    },

    methods: {
        reset() {
            this.keyword = '';
        }
    }
}
</script>

<style lang="scss" scoped>
.search-button {
    position: absolute;
    top: 12px;
    right: 12px;
    cursor: pointer;
}
</style>