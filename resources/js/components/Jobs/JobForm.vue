<template>
    <fragment>
        <form id="job-form" class="px-1 px-md-4" @submit.prevent="processJobForm">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
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
                    <textarea class="form-control" id="description" placeholder="Job description" rows="3"
                        v-model="form.description">
                    </textarea>
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
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dropzone">Add Site Plans/Drawings</label>
                    <file-upload ref="fileDropzone"></file-upload>
                </div>  
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dropzone">Search For Address</label>
                    <search placeholder="Enter postcode" @search="getLatLng"></search>
                </div>  
            </div>
            <div class="row pt-5">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="#">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                    <button type="submit" class="btn btn-primary">
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
                    city: '',
                    postcode: '',
                    lat: null,
                    lng: null
                },
            },
            titleOptions: {
                max: 50
            },  
            loading: false
        }
    },

    methods: {
        getLatLng(postcode) {
            // Delete X-CSRF-TOKEN header for this particular request
            var instance = axios.create();
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            delete instance.defaults.headers.common['X-Requested-With'];

            axios.get(`https://api.postcodes.io/postcodes?q=${postcode}`)
            .then(response => {
                console.log(response);
            });
        },

        processJobForm() {
            this.loading = true;

            axios.post('/api/hub/jobs/create', this.form)
            .then(response => {
                this.$refs.fileDropzone.upload();

                this.loading = false;
                this.$swal(response.data.alert);
            })
            .catch(err => {
                console.log(err);
            });
        }
    }
}
</script>