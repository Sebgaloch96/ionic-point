<template>
    <div>
        <input class="form-control p-2 rounded-0" type="text" placeholder="Search" v-model="keyword" @keyup="$emit('search', keyword)">
    </div>
</template>

<script>
export default {
    data () {
        return {
            keyword: '',
        }
    }
}
</script>