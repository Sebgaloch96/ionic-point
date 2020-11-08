<template>
    <div>
        <div class="row justify-content-center px-1 px-md-4">
            <div class="col-md-12">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="jobs-tab-menu" role="tablist">
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
                            <div class="col-md-6 align-middle">
                                <h4 class="text-light font-weight-bolder mb-0">Total Jobs: {{ jobs.meta.total }}</h4>
                                <small class="text-light">Showing page {{ jobs.meta.current_page }} out of {{ jobs.meta.last_page }}</small>
                            </div>
                            <div class="col-md-6">                               
                                <search class="mx-2" v-on:search="onJobSearch"></search>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="loading" class="row align-items-center">
                    <div class="col-md-12 justify-content-center">
                        <div class="d-block spinner-border text-color-dark" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div v-if="!loading && jobs.meta.total > 0">
                    <!-- Applied Filters -->
                    <div class="row align-items-center pt-4">
                        <div class="col-md-10">
                            <h4 class="text-muted font-weight-bold d-inline">Applied Filters: </h4> 
                            <v-select multiple v-model="filters" :options="['Active','Inactive']" class="d-inline-block w-25"></v-select>
                        </div>
                        <div class="col-md-2 justify-content-end">
                            <div class="dropdown text-right">
                                Sort:
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownSort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span v-html="sort.markup"></span>
                                </a>

                                <div class="dropdown-menu rounded-0 shadow" aria-labelledby="dropdownSort">
                                    <a class="dropdown-item" href="#" data-sort="newest" @click="onSort">Newest First</a>
                                    <a class="dropdown-item" href="#" data-sort="oldest" @click="onSort">Oldest First</a>
                                    <a class="dropdown-item" href="#" data-sort="asc" @click="onSort"><i class="fas fa-sort-alpha-up"></i> Ascending</a>
                                    <a class="dropdown-item" href="#" data-sort="desc" @click="onSort"><i class="fas fa-sort-alpha-down-alt"></i> Descending</a>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="job-listings" role="tabpanel" aria-labelledby="job-listings-tab">                           
                            <job v-for="job in jobs.data" :key="job.reference" v-bind="job"></job>                          
                            <!-- Pagination -->
                            <pagination class="mt-5" :data="jobs" :limit="4" align="center" size="large" @pagination-change-page="getJobs"></pagination>
                        </div>
                        <div class="tab-pane fade" id="your-jobs" role="tabpanel" aria-labelledby="your-jobs-tab">
                            <job v-for="job in jobs.data" :key="job.reference" v-bind="job"></job>
                            <!-- Pagination -->
                            <pagination class="mt-5" :data="jobs" :limit="4" align="center" size="large" @pagination-change-page="getJobs"></pagination>                            
                        </div>
                        <div class="tab-pane fade" id="job-map" role="tabpanel" aria-labelledby="job-map-tab">
                            
                        </div>                   
                    </div>
                </div>  
                <div v-if="!loading && jobs.meta.total == 0" class="text-center mt-4">
                    <h5 class="text-muted font-weight-bolder">No Results Found</h5>
                </div>           
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        auth: Object,
    },

    data () {
        return {
            jobs: {},
            currentUrl: '/api/hub/jobs/listed',
            searchFilter: null,
            filters: [],
            sort: {
                value: 'newest',
                markup: 'Newest First'
            },
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
        },
        
        sort: {
            handler(value) {
                this.getJobs();
            },
            deep: true
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
                    'search-filter': this.searchFilter,
                    'sort': this.sort.value
                }
            })
            .then(response => {
                this.jobs = response.data
            })
            .then(() => {
                this.loading = false;
            });
        },

        onJobSearch(keyword) {
            this.loading = true;

            this.searchFilter = keyword;
        },

        onSort() {
            this.loading = true;
            
            this.sort.value = event.currentTarget.getAttribute('data-sort');
            this.sort.markup = event.target.innerHTML;
        }
    },
}
</script>