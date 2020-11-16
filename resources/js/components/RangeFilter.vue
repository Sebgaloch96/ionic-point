<template>
    <div>
        <label for="radius_filter">Show jobs within {{ rangeFilter.value|toMiles }} miles</label>
        <input type="range" class="form-control-range" id="radius_filter"
            :min="rangeFilter.min"
            :max="rangeFilter.max"
            :step="rangeFilter.step" 
            v-model="rangeFilter.value"
            @change="onChange">
    </div>
</template>

<script>
import { latLng } from "leaflet";

export default {
    props: ['lat', 'lng'],

    data () {
        return {
            rangeFilter: {
                value: 0,
                min: 0,
                max: this.getMilesAsMeters(1000),
                step: this.getMilesAsMeters(1),
                bounds: null
            }
        }
    },

    watch: {
        rangeFilter: {
            handler(filterProps) {
                if (filterProps.value < this.getMilesAsMeters(100)) {
                    this.rangeFilter.step = this.getMilesAsMeters(1);
                }
                if (filterProps.value >= this.getMilesAsMeters(100) && filterProps.value <= this.getMilesAsMeters(500)) {
                    this.rangeFilter.step = this.getMilesAsMeters(25);
                }
                if (filterProps.value >= this.getMilesAsMeters(500) && filterProps.value <= this.getMilesAsMeters(1000)) {
                    this.rangeFilter.step = this.getMilesAsMeters(50);
                }
            },
            deep: true
        },
    },

    methods: {
        onChange() {
            let bounds = this.calculateBounds(this.rangeFilter.value, this.lat, this.lng);
            this.rangeFilter.bounds = bounds;

            if (this.rangeFilter.value <= 0) {
                this.rangeFilter.bounds = null;
            }

            this.$emit('range-changed', this.rangeFilter.bounds);
        },

        getMilesAsMeters(miles) {
            return 1609.344 * miles;
        },

        calculateBounds(meters, lat, lng) {
            var center = latLng(lat, lng);
            var bounds = center.toBounds(meters);

            return { north_east: bounds._northEast, south_west: bounds._southWest };
        },

        reset() {
            this.rangeFilter.value = 0;
        }
    }
}
</script>