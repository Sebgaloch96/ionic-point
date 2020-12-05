<template>
    <fragment>
        <form id="job-form" class="px-1 px-md-4" @submit.prevent="processJobForm">
            <!-- Job Details -->
            <div class="row">
                <div class="col-12">
                    <h3>Details</h3>
                    <hr>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xl-6">
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
                <div class="form-group col-xl-6">
                    <label for="description">Description</label> 
                    <small v-if="form.description.length == 0" class="text-danger">Required</small>
                    <ckeditor :editor="editor" class="form-control" v-model="form.description"></ckeditor>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xl-6">
                    <label for="dropzone">Site Plans / Drawings</label>
                    <file-upload ref="fileDropzone"></file-upload>
                </div>  
            </div>

            <!-- Schedule -->
            <div class="row">
                <div class="col-12">
                    <h3 class="mt-4">Schedule</h3>
                    <hr>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xl-3">
                    <label for="start-date">Start</label>
                    <input type="datetime-local" class="form-control" id="start_date" v-model="form.start_date">
                </div>
                <div class="form-group col-xl-3">
                    <label for="end-date">End</label>
                    <input type="datetime-local" class="form-control" id="end_date" v-model="form.end_date">
                </div>
            </div>

            <!-- Address -->
            <div class="row">
                <div class="col-12">
                    <h3 class="mt-4">Address</h3>
                    <hr>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <address-lookup @udprn-lookup="onAddressSearch"></address-lookup>
                </div>
            </div>
            <div v-if="addressFilled" class="row">
                <div class="col-12">
                    <div class="form-row">
                        <div class="form-group col-xl-6">
                            <label for="address-line-1">Address Line 1</label> 
                            <small v-if="form.address.address_line_1.length == 0" class="text-danger">Required</small>
                            <input type="text" id="address-line-1" class="form-control" v-model="form.address.address_line_1">
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xl-6">
                            <label for="address-line-2">Address Line 2</label>
                            <input type="text" id="address-line-2" class="form-control" v-model="form.address.address_line_2">
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xl-6">
                            <label for="address-line-3">Address Line 3</label>
                            <input type="text" id="address-line-3" class="form-control" v-model="form.address.address_line_3">
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xl-3">
                            <label for="city">Town / City</label>
                            <small v-if="form.address.city.length == 0" class="text-danger">Required</small>
                            <input type="text" id="city" class="form-control" v-model="form.address.city">
                        </div>  
                        <div class="form-group col-xl-3">
                            <label for="county">County / State / Province</label>
                            <small v-if="form.address.county.length == 0" class="text-danger">Required</small>
                            <input type="text" id="county" class="form-control" v-model="form.address.county">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xl-3">
                            <label for="country">Country</label>
                            <small v-if="form.address.country.length == 0" class="text-danger">Required</small>
                            <input type="text" id="country" class="form-control" v-model="form.address.country">
                        </div>  
                        <div class="form-group col-xl-3">
                            <label for="postcode">Postcode</label>
                            <small v-if="form.address.postcode.length == 0" class="text-danger">Required</small>
                            <input type="text" id="postcode" class="form-control" v-model="form.address.postcode">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional options -->
            <div class="row">
                <div class="col-12">
                    <h3 class="mt-4">Additional Options</h3>
                    <hr>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xl-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" v-model="form.public">
                        <label class="form-check-label" for="defaultCheck1">
                            Publicly Visible
                        </label>
                        <small class="color-custom-dark d-block">Uncheck if you would like to hide this job from engineers. This can be changed at any time.</small>
                    </div>
                </div>
            </div>

            <div class="form-row py-5">
                <div class="col-12">
                    <a class="btn btn-primary" href="/hub/jobs/manage">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fas fa-save"></i>
                        Save
                    </button>
                </div>
            </div>
        </form>
    </fragment>
</template>

<script>
import moment from "moment";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import AddressLookup from "../AddressLookup";

export default {
    components: {
        ckeditor: CKEditor.component,
        AddressLookup
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
                public: true
            },
            addressFilled: false,
            titleOptions: {
                max: 50
            },
            editor: ClassicEditor,
            errors: [],
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

            this.addressFilled = true;
        }
    }
}
</script>