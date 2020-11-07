<template>
    <div>
        <div class="card card-job shadow-sm border-0 rounded-0 my-3">
            <div class="card-header bg-custom-light font-weight-bolder rounded-0">
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
                    <div class="col-md-3 text-right">
                        <a href="#" class="btn btn-link text-custom-dark"><i class="fas fa-eye fa-lg"></i></a>
                        <a href="#" class="btn btn-link text-custom-dark"><i class="fas fa-check fa-lg"></i></a>
                        <a href="#" class="btn btn-link text-custom-dark"><i class="far fa-bookmark fa-lg"></i></a>
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
export default {
    props: {
        title: String,
        description: String,
        created_at: String,
        address: Object
    }
}
</script>