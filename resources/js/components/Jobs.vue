<template>
    <div>
        <div class="row justify-content-center px-1 px-md-4">
            <div class="col-md-12">
                <!-- Tabs -->
                <ul class="nav nav-pills nav-fill" id="jobs-tab-menu" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="job-listings-tab" data-toggle="pill" href="#job-listings" role="tab" aria-controls="job-listings" aria-selected="true"
                        @click="getJobs" data-url="/api/hub/jobs/listed">
                            <strong>Job Listings</strong>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="your-jobs-tab" data-toggle="pill" href="#your-jobs" role="tab" aria-controls="your-jobs" aria-selected="false"
                        @click="getJobs" data-url="/api/hub/jobs/myJobs">
                            <strong>Your Jobs</strong>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="job-map-tab" data-toggle="pill" href="#job-map" role="tab" aria-controls="job-map" aria-selected="false">
                            <strong>Job Map</strong>
                        </a>
                    </li>
                </ul>

                <!-- Filter Bar -->
                <div class="card card-filters m-0 p-0 border-0">
                    <div class="card-body bg-custom-dark">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h3 class="text-white"><strong class="mr-2">Jobs</strong> <span class="badge badge-light rounded-0">{{ jobs.total }}</span></h3>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <search class="mx-2" v-on:search="onJobSearch"></search>
                                <a href="#" class="btn btn-light rounded-0 mx-2"><i class="fas fa-filter fa-lg"></i></a>
                                <a href="#" class="btn btn-light rounded-0 mx-2"><i class="fas fa-plus fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center pt-4">
                    <div class="col-md-8">
                        <h4 class="text-muted font-weight-bold">Applied Filters: </h4> 
                    </div>
                    <div class="col-md-4 justify-content-end">
                        
                    </div>
                </div>
                
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="job-listings" role="tabpanel" aria-labelledby="job-listings-tab">
                        <div v-if="!loading">
                            <job v-for="job in jobs.data" :key="job.reference" v-bind="job"></job>
                        </div>
                        <div v-else class="spinner-border text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="your-jobs" role="tabpanel" aria-labelledby="your-jobs-tab">
                        <div v-if="!loading">
                            <job v-for="job in jobs.data" :key="job.reference" v-bind="job"></job>
                        </div>
                        <div v-else class="spinner-border text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>                       
                    </div>
                    <div class="tab-pane fade" id="job-map" role="tabpanel" aria-labelledby="job-map-tab">
                        
                    </div>                   
                </div>

                <pagination class="mt-5" :data="jobs" :limit="4" align="center" size="large" @pagination-change-page="getJobs"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            jobs: {},
            jobCount: 0,
            currentUrl: '/api/hub/jobs/listed',
            searchFilter: null,
            loading: false
        }
    },

    created () {
        // Get initial job list
        this.getJobs();

        // For search bar
        // Only allow http get request to fire after user has stopped typing
        this.debouncedGetJobs = _.debounce(this.getJobs, 500);
    },

    watch: {
        searchFilter(newSearchFilter, oldSearchFilter) {
            this.debouncedGetJobs();
        }
    },

    methods: {
        getJobs(page = 1) {
            this.loading = true;

            if (event && event.currentTarget.getAttribute('data-url')) {
                this.currentUrl = event.currentTarget.getAttribute('data-url');
            }
            
            axios.get(this.currentUrl+'?page=' + page, {
                params: {
                    'search-filter': this.searchFilter
                }
            })
            .then(response => {
                this.jobs = response.data
            })
            .then(() => {
                console.log(this.jobs);
                this.loading = false;
            });
        },

        onJobSearch(keyword) {
            this.loading = true;

            this.searchFilter = keyword;
        }
    },
}
</script>