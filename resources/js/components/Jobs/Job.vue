<template>
    <div>
        <div class="card card-job shadow-sm border-0 rounded-0 my-3">
            <div class="card-header bg-white font-weight-bolder rounded-0">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        {{ title }}
                        <small class="text-muted d-block">Listed {{ created_at|fromNow }}</small>
                    </div>
                    <div class="col-md-2">
                        <h6><span class="badge badge-secondary">Active</span></h6>
                    </div>
                    <div class="col-md-3">
                        <h6 class="text-muted"><strong>{{ address.city }} - {{ address.postcode }}</strong></h6>
                    </div>
                    <div class="col-md-3 text-right text-custom-dark">
                        <i class="fas fa-eye fa-lg mx-2"></i>
                        <i class="fas fa-check fa-lg mx-2"></i>
                        <i :class="{ fas: isBookmarked, far: !isBookmarked }" @click="setBookmark" class="fa-bookmark fa-lg mx-2"></i>
                    </div>
                </div>            
            </div>

            <div class="card-body">
                {{ description }}
            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';

export default {
    props: {
        uuid: String,
        title: String,
        description: String,
        created_at: String,
        address: Object,
        bookmark: Object
    },

    data () {
        return {
            isBookmarked: false
        }
    },

    mounted () {
        this.isBookmarked = this.bookmark !== null;
    },

    methods: {
        setBookmark () {
            axios.post(`/api/hub/jobs/${this.uuid}/bookmark`)
            .then(response => {
                this.isBookmarked = !this.isBookmarked; 
            })
            .then(() => {
                if (this.isBookmarked) {
                    Vue.$toast.success('Bookmark Added');
                } else {
                    Vue.$toast.success('Bookmark Removed');
                }

                this.$emit('bookmark-changed');
            });
        }
    },
}
</script>