<template>
    <div>
        <div class="row justify-content-center px-1 px-md-4">
            <div class="col-md-12">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="jobs-tab-menu" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="job-listings-tab" data-toggle="pill" href="#job-listings" role="tab" aria-controls="job-listings" aria-selected="true"
                        @click="onSwitchTabs" data-url="/api/hub/jobs/listed">
                            <strong>Job Listings</strong>
                        </a>
                    </li>
                    <li v-if="userHasRoles(['Engineer', 'Project Manager'])" class="nav-item" role="presentation">
                        <a class="nav-link" id="bookmarks-tab" data-toggle="pill" href="#bookmarks" role="tab" aria-controls="bookmarks" aria-selected="false"
                        @click="onSwitchTabs" data-url="/api/hub/jobs/myBookmarks">
                            <strong>Your Bookmarks</strong>
                        </a>
                    </li>
                    <li v-if="userHasRoles(['Engineer', 'Project Manager'])" class="nav-item" role="presentation">
                        <a class="nav-link" id="your-jobs-tab" data-toggle="pill" href="#your-jobs" role="tab" aria-controls="your-jobs" aria-selected="false"
                        @click="onSwitchTabs" data-url="/api/hub/jobs/myJobs">
                            <strong>Your Jobs</strong>
                        </a>
                    </li>
                    <li v-if="userHasRoles(['Project Manager'])" class="nav-item" role="presentation">
                        <a class="nav-link" id="your-job-listings-tab" data-toggle="pill" href="#your-job-listings" role="tab" aria-controls="your-job-listings" aria-selected="false"
                        @click="onSwitchTabs" data-url="/api/hub/jobs/myJobs">
                            <strong>Your Job Listings</strong>
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
                                <search ref="search" class="mx-2" @search="onJobSearch"></search>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Applied Filters -->
                <div class="row align-items-center pt-3">
                    <div class="col-md-4">
                        <button type="button" id="sidebarCollapse" class="btn bg-custom-dark text-white rounded-0" @click="onRefresh">
                            <i class="fas fa-sync mr-1"></i>
                            Refresh
                        </button>
                        <button v-if="dirtyFilters" type="button" id="sidebarCollapse" class="btn bg-custom-dark text-white rounded-0" @click="onClearFilters">
                            <i class="fas fa-backspace mr-1"></i>
                            Clear Filters
                        </button>
                    </div>
                    <div class="col-md-8 justify-content-end">
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

                <div class="row">
                    <div class="col-12 col-md-4">
                        <job-map :auth="auth" :jobs="jobs" @job-marker-clicked="onJobSearch"></job-map>

                        <div class="card rounded-0 border-0">
                            <div class="card-header bg-custom-dark rounded-0">
                                <h4 class="font-weight-bold text-white m-0">Filters</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <range-filter ref="rangeFilter"
                                            :lat="auth.address.lat" 
                                            :lng="auth.address.lng" 
                                            @range-changed="onRangeChange">
                                        </range-filter>
                                    </div>
                                    <div class="col-12">
                                        <label class="font-weight-bolder" for="status_filter">Status</label>
                                        <v-select id="status_filter" multiple v-model="selectedFilter" class="w-100"></v-select>
                                    </div> 
                                </div>                                   
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div v-if="loading" class="row align-items-center">
                            <div class="col-md-12 justify-content-center">
                                <div class="d-block spinner-border text-color-dark" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div v-if="!loading && jobs.meta.total > 0">
                            <!-- Tab Content -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" :id="tabInfo.currentTab" role="tabpanel" :aria-labelledby="tabInfo.currentTab+'-tab'">                           
                                    <job-item v-for="job in jobs.data" :key="job.reference" v-bind="job" @bookmark-changed="getJobs"></job-item>                          
                                    <!-- Pagination -->
                                    <pagination class="mt-5" :data="jobs" :limit="4" align="center" size="large" @pagination-change-page="getJobs"></pagination>
                                </div>                 
                            </div>
                        </div>
                        <div v-if="!loading && jobs.meta.total == 0" class="text-center mt-4">
                            <h5 class="text-muted font-weight-bolder">No Results Found</h5>
                        </div>  
                    </div>
                </div>               
            </div>
        </div>
    </div>
</template>

<script>
import { latLng } from "leaflet";

export default {
    props: {
        auth: Object,
    },

    data () {
        return {
            jobs: {},
            tabInfo: {
                currentUrl: '/api/hub/jobs/listed',
                currentTab: 'job-listings',
            },           
            searchFilter: null,
            selectedFilter: null,
            rangeFilter: null,
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
        tabInfo: {
            handler(value) {
                this.getJobs();
            },
            deep: true
        },

        searchFilter() {
            this.debouncedGetJobs();
        },

        rangeFilter() {
            this.getJobs();
        },
        
        sort: {
            handler(value) {
                this.getJobs();
            },
            deep: true
        },
    },

    methods: {
        getJobs(page = 1) {         
            axios.get(this.tabInfo.currentUrl+'?page=' + page, {
                params: {
                    'search-filter': this.searchFilter,
                    'range-filter': this.rangeFilter,
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

        onRefresh() {
            this.loading = true;
            this.getJobs();
        },

        onSwitchTabs() {
            let tab = event.currentTarget.getAttribute('aria-controls');
            let url = event.currentTarget.getAttribute('data-url');

            // If clicking on the same tab, don't do anything
            if (this.tabInfo.currentTab != tab) {
                this.loading = true;
                this.tabInfo.currentUrl = url;
                this.tabInfo.currentTab = tab;
            }
        },

        onJobSearch(keyword) {
            this.loading = true;
            this.searchFilter = keyword;
        },

        onSort() {
            let sortValue = event.currentTarget.getAttribute('data-sort');

            // If clicking on the current sort option, don't do anything
            if (this.sort.value != sortValue) {
                this.loading = true;
                this.sort.value = sortValue;
                this.sort.markup = event.target.innerHTML;
            }    
        },

        onClearFilters() {
            if (this.searchFilter !== null) {
                this.loading = true;
                // Clear search filter
                this.searchFilter = null;
                this.$refs.search.reset();
            }

            if (this.rangeFilter !== null) {
                this.loading = true;
                // Clear range filter
                this.rangeFilter = null;
                this.$refs.rangeFilter.reset();
            }
        },

        onRangeChange(bounds) {
            this.rangeFilter = bounds;
        },

        userHasRoles(roles) {
            const authRoles = this.auth.roles.map(role => {
                return role.name;
            });
            
            return roles.every(role => authRoles.includes(role));
        },
    },

    computed: {
        dirtyFilters() {
            return (this.searchFilter !== null && this.searchFilter !== '')
                || this.rangeFilter !== null;
        }
    }
}
</script>
