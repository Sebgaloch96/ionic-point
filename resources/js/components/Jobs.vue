<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-fill mb-4 mx-1 mx-md-4" id="jobs-tab-menu" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="job-listings-tab" data-toggle="pill" href="#job-listings" role="tab" aria-controls="job-listings" @click="getListed()" aria-selected="true">Job Listings</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="your-jobs-tab" data-toggle="pill" href="#your-jobs" role="tab" aria-controls="your-jobs" @click="getMyJobs()" aria-selected="false">Your Jobs</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="all-jobs-tab" data-toggle="pill" href="#all-jobs" role="tab" aria-controls="all-jobs" aria-selected="false">All Jobs</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="job-listings" role="tabpanel" aria-labelledby="job-listings-tab">
                        <job v-for="job in jobs" :key="job.reference" v-bind="job"></job>
                    </div>
                    <div class="tab-pane fade" id="your-jobs" role="tabpanel" aria-labelledby="your-jobs-tab">
                        <job v-for="job in jobs" :key="job.reference" v-bind="job"></job>
                    </div>
                    <div class="tab-pane fade" id="all-jobs" role="tabpanel" aria-labelledby="all-jobs-tab">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            jobs: null,
            loading: false
        }
    },

    created () {
        this.getListed();
    },

    methods: {
        getListed() {
            this.loading = true;

            axios.get('/api/hub/jobs/listed')
            .then(response => {
                this.jobs = response.data.jobs;
            })
            .then(() => {
                this.loading = false;
            });
        },

        getMyJobs() {
            this.loading = true;

            axios.get('/api/hub/jobs/myJobs')
            .then(response => {
                this.jobs = response.data.jobs;
            })
            .then(() => {
                this.loading = false;
            });
        }
    }
}
</script>