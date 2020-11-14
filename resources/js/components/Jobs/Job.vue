<template>
    <div>
        <div class="card card-job shadow-sm border-0 rounded-0 my-3">
            <div class="card-header bg-white font-weight-bolder rounded-0">
                <div class="row">
                    <div class="col-md-5">
                        <h6 class="m-0"><strong>{{ title }}</strong></h6>
                        <small class="text-muted d-block mr-2">Listed {{ created_at|fromNow }}</small>
                        <h6 class="d-block"><span class="badge badge-success">{{ status }}</span></h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="m-0"><strong>Location</strong></h6>
                        <small class="d-block">{{ address.city }}</small>
                        <small class="d-block">{{ address.postcode }}</small>
                    </div>
                    <div class="col-md-2">
                        <h6 class="m-0"><strong>Duration</strong></h6>
                        <small class="d-block">{{ length_of_job }} days</small>
                        <small class="d-block">{{ start_date|standardFormat }} - {{ end_date|standardFormat }}</small>
                    </div>
                    <div class="col-md-3 text-right text-custom-dark align-self-center">
                        <i class="fas fa-eye fa-lg mx-2"></i>
                        <i class="fas fa-check fa-lg mx-2"></i>
                        <i :class="{ fas: isBookmarked, far: !isBookmarked }" @click="setBookmark" class="fa-bookmark fa-lg mx-2"></i>
                    </div>
                </div>            
            </div>

            <div class="card-body">
                {{ description.substr(0, 120) + '...' }}
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
        status: String,
        length_of_job: Number,
        start_date: String,
        end_date: String,
        created_at: String,
        address: Object,
        isBookmarked: Boolean
    },

    methods: {
        setBookmark () {
            axios.post(`/api/hub/jobs/${this.uuid}/bookmark`)
            .then(response => {          
                Vue.$toast.success(response.data.title);            
            })
            .then(() => {
                this.$emit('bookmark-changed');
            });
        }
    },
}
</script>