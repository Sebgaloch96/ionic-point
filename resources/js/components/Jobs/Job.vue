<template>
    <div>
        <div class="card card-job shadow-sm border-0 rounded-0 mx-1 mx-md-4 my-3">
            <div class="card-header bg-white font-weight-bolder rounded-0">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        {{ title }}
                        <small class="text-muted d-block">Listed {{ created_at|fromNow }}</small>
                    </div>
                    <div class="col-md-2">
                        <h4><span class="badge badge-secondary">Active</span></h4>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-muted"><strong>{{ address.city }} - {{ address.postcode }}</strong></h6>
                    </div>
                    <div class="col-md-5 text-right">
                        <a href="#" class="btn btn-link text-custom-dark"><i class="fas fa-eye fa-lg"></i></a>
                        <a href="#" class="btn btn-link text-custom-dark"><i class="fas fa-check fa-lg"></i></a>
                        <a href="#" class="btn btn-link text-custom-dark"><i class="fas fa-trash fa-lg"></i></a>
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