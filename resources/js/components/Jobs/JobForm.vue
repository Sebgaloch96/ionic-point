<template>
    <fragment>
        <form id="job-form" class="px-1 px-md-4" @submit.prevent="processJobForm">
            <!-- Job Details -->
            <div class="row">
                <div class="col-md-12">
                    <h3>Job Details</h3>
                    <hr>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label> 
                    <small v-if="form.title.length == 0" class="text-danger">Required</small>
                    <div class="input-with-counter">
                        <input type="text" class="form-control" id="title" placeholder="Job title" 
                            v-model="form.title"
                            :maxlength="titleOptions.max">
                        <div class="input-counter">{{ titleOptions.max - form.title.length }}</div>
                    </div>
                    <small class="color-custom-dark">Maximum of 50 characters</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="description">Description</label> 
                    <small v-if="form.description.length == 0" class="text-danger">Required</small>
                    <textarea class="form-control" id="description" placeholder="Job description" rows="3"
                        v-model="form.description">
                    </textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dropzone">Site Plans / Drawings</label>
                    <file-upload ref="fileDropzone"></file-upload>
                </div>  
            </div>

            <!-- Schedule -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mt-4">Schedule</h3>
                    <hr>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="start-date">Start Date</label>
                    <datepicker placeholder="dd/mm/yyyy" input-class="form-control bg-white" id="start-date" 
                        v-model="form.start_date">
                    </datepicker>
                </div>
                <div class="form-group col-md-3">
                    <label for="end-date">End Date</label>
                    <datepicker placeholder="dd/mm/yyyy" input-class="form-control bg-white" id="end-date" 
                        v-model="form.end_date">
                    </datepicker>  
                </div>
            </div>

            <!-- Address -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mt-4">Address</h3>
                    <hr>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <address-lookup @udprn-lookup="onAddressSearch"></address-lookup>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address-line-1">Address Line 1</label> 
                    <small v-if="form.address.address_line_1.length == 0" class="text-danger">Required</small>
                    <input type="text" id="address-line-1" class="form-control" v-model="form.address.address_line_1">
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address-line-2">Address Line 2</label>
                    <input type="text" id="address-line-2" class="form-control" v-model="form.address.address_line_2">
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address-line-3">Address Line 3</label>
                    <input type="text" id="address-line-3" class="form-control" v-model="form.address.address_line_3">
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="city">Town / City</label>
                    <small v-if="form.address.city.length == 0" class="text-danger">Required</small>
                    <input type="text" id="city" class="form-control" v-model="form.address.city">
                </div>  
                <div class="form-group col-md-3">
                    <label for="county">County / State / Province</label>
                    <small v-if="form.address.county.length == 0" class="text-danger">Required</small>
                    <input type="text" id="county" class="form-control" v-model="form.address.county">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="country">Country</label>
                    <small v-if="form.address.country.length == 0" class="text-danger">Required</small>
                    <input type="text" id="country" class="form-control" v-model="form.address.country">
                </div>  
                <div class="form-group col-md-3">
                    <label for="postcode">Postcode</label>
                    <small v-if="form.address.postcode.length == 0" class="text-danger">Required</small>
                    <input type="text" id="postcode" class="form-control" v-model="form.address.postcode">
                </div>
            </div>

            <div class="form-row pt-5">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save"></i>
                        Save
                    </button>
                    <a class="btn btn-primary btn-block" href="#">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
        </form>
    </fragment>
</template>

<script>
import moment from "moment";
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
        Datepicker
    },

    data() {
        return {
            form: {
                title: '',
                description: '',
                start_date: null,
                end_date: null,
                address: {
                    address_line_1: '',
                    address_line_2: '',
                    address_line_3: '',
                    country: '',
                    county: '',
                    city: '',
                    postcode: '',
                    lat: null,
                    lng: null
                },
            },
            errors: [],
            titleOptions: {
                max: 50
            },
            loading: false
        }
    },

    methods: {
        processJobForm() {
            axios.post('/api/hub/jobs/create', this.form)
            .then(response => {
                this.$refs.fileDropzone.upload();

                this.$swal(response.data.alert);
            })
            .catch(err => {
                this.errors.push(err);
            });
        },

        onAddressSearch(address) {
            this.form.address.address_line_1 = address.line_1;
            this.form.address.address_line_2 = address.line_2;
            this.form.address.address_line_3 = address.line_3;
            this.form.address.city = address.district;
            this.form.address.county = address.county;
            this.form.address.country = address.country;
            this.form.address.postcode = address.postcode;
            this.form.address.lat = address.latitude;
            this.form.address.lng = address.longitude;
        }
    }
}
</script>