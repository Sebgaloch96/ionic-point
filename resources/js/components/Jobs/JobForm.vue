<template>
    <fragment>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" max="50" placeholder="Job title">
                    <small class="color-custom-dark">Maximum of 50 characters</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" placeholder="Job description" rows="1"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start-date">Start Date</label>
                    <datepicker placeholder="dd/mm/yyyy" input-class="form-control bg-white" id="start-date" 
                        v-model="start_date">
                    </datepicker>
                </div>
                <div class="form-group col-md-3">
                    <label for="length-of-job">Length of Job</label>
                    <input type="number" class="form-control" id="length-of-job" placeholder="Enter number of days">
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="#">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                    <a class="btn btn-primary" href="#">
                        <i class="fas fa-save"></i>
                        Save
                    </a>
                </div>
            </div>
        </form>
    </fragment>
</template>

<script>
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
        Datepicker
    },

    data() {
        return {
            title: null,
            description: null,
            start_date: null,
            length_of_job: null,
            address: {
                address_line_1: null,
                address_line_2: null,
                address_line_3: null,
                city: null,
                postcode: null,
                lat: null,
                lng: null
            }
        }
    }
}
</script>