<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-fill mb-4 mx-1 mx-md-4" id="jobs-tab-menu" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="job-listings-tab" data-toggle="pill" href="#job-listings" role="tab" aria-controls="job-listings" aria-selected="true">Job Listings</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="your-jobs-tab" data-toggle="pill" href="#your-jobs" role="tab" aria-controls="your-jobs" aria-selected="false">Your Jobs</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="all-jobs-tab" data-toggle="pill" href="#all-jobs" role="tab" aria-controls="all-jobs" aria-selected="false">All Jobs</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="job-listings" role="tabpanel" aria-labelledby="job-listings-tab">
                        <div v-for="job in jobs" :key="job.id" class="card card-job shadow-sm border-0 rounded-0 mx-1 mx-md-4 my-3">
                            <div class="card-header bg-white font-weight-bolder rounded-0">
                                {{ job.title }} #{{ job.ref }}
                                <small class="text-muted d-block">Added {{ job.created_at }}</small>
                            </div>

                            <div class="card-body">
                                {{ job.description }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="your-jobs" role="tabpanel" aria-labelledby="your-jobs-tab">
                        
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
    props: {
        jobs: Object,
    },
    data () {
        return {

        }
    },
}
</script>