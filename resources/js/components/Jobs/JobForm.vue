<template>
    <fragment>
        <form class="px-1 px-md-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <div class="input-with-counter">
                        <input type="text" class="form-control" id="title" placeholder="Job title" 
                            v-model="title.text"
                            :maxlength="title.max">
                        <div class="input-counter">{{ title.max - title.text.length }}</div>
                    </div>
                    <small class="color-custom-dark">Maximum of 50 characters</small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" placeholder="Job description" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="start-date">Start Date</label>
                    <datepicker placeholder="dd/mm/yyyy" input-class="form-control bg-white" id="start-date" 
                        v-model="start_date">
                    </datepicker>
                </div>
                <div class="form-group col-md-3">
                    <label for="length-of-job">Length of Job</label>
                    <input type="number" class="form-control" id="length-of-job" min="1" placeholder="Enter number of days"
                        v-model="length_of_job">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="end-date">End Date</label>
                    <input type="text" class="form-control" v-model="endDate" id="end-date" disabled>  
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
import moment from "moment";
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
        Datepicker
    },

    data() {
        return {
            title: {
                text: '',
                max: 50
            },
            description: null,
            start_date: null,
            length_of_job: 1,
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
    },

    computed: {
        endDate() {
            if (this.start_date !== null) {
                return moment(this.start_date)
                    .add(this.length_of_job - 1, 'days')
                    .format('DD/MM/YYYY');
            }
            return 'N/A';
        }
    }
}
</script>