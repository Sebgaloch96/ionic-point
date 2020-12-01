<template>
    <fragment>
        <div class="form-row">
            <div class="col-xl-6">
                <label>Search For Address</label>
                <search ref="address_lookup" placeholder="Enter postcode, street address or business name" @search="onAddressLookup"></search>
                <small v-if="error != ''" class="text-danger">{{ error }}</small>
            </div>
            <div class="col-xl-6">
                <div v-if="loading" class="spinner-border spinner-small" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div v-if="hits && hits.length > 0 && !loading" class="dropdown-menu rounded-0 shadow fade show address-hits">
                    <a class="dropdown-item" v-for="(hit, index) in hits" :key="index" 
                        @click.prevent="getAddress(hit.udprn)">
                        {{ hit.suggestion }}
                    </a>
                </div>
            </div>
        </div>
    </fragment>
</template>

<script>
export default {
    data() {
        return {
            hits: [],
            error: '',
            apiKey: 'ak_khqkltl9fMsSTuUrLMlj3yo9TcukK',
            url: 'https://api.ideal-postcodes.co.uk/v1/autocomplete/addresses',
            term: '',
            loading: false
        }
    },

    created() {
        this.debouncedAddressLookup = _.debounce(this.addressLookup, 500);
    },

    watch: {
        lookupTerm() {
            this.debouncedAddressLookup();
        }
    },

    computed: {
        lookupTerm() {
            return this.term;
        }
    },

    methods: {
        onAddressLookup(term) {
            this.loading = true;
            this.term = term;
        },

        addressLookup() {
            const request = this.requestWithoutHeaders(['X-CSRF-TOKEN', 'Authorization']);

            request.get(`${this.url}?q=${this.term}&api_key=${this.apiKey}`)
            .then(response => {
                if (response.data.code == 2000) {
                    this.hits = response.data.result.hits;

                    if (this.hits.length == 0) {
                        this.error = 'No results found';
                    } else {
                        this.error = '';
                    }
                }
            })
            .catch(err => {
                this.$swal({
                    title: 'Oops! Something went wrong',
                    message: 'Please try again',
                    icon: 'error'
                });
            })
            .then(() => {
                this.loading = false;
            });
        },

        getAddress(udprn) {
            const request = this.requestWithoutHeaders(['X-CSRF-TOKEN', 'Authorization']);
            udprn = 0;

            request.get(`https://api.ideal-postcodes.co.uk/v1/addresses/${udprn}?api_key=${this.apiKey}`)
            .then(response => {
                if (response.data.code == 2000) {
                    let address = response.data.result;

                    this.$emit('udprn-lookup', address);

                    this.hits = [];
                } else if (response.data.code == 4040) {
                    this.$swal({
                        title: 'Error',
                        message: 'No information was found for this address',
                        icon: 'error'
                    });
                }
            })
            .catch(err => {
                this.$swal({
                    title: 'Oops! Something went wrong',
                    message: 'Please try again',
                    icon: 'error'
                });
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.address-hits {
    top: 30px;
    height: 400px;
    overflow-y: auto;
}
</style>