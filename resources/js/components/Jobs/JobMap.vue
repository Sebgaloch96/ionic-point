<template>
    <div class="mb-3" style="height: 400px; width: 100%">
        <l-map
            ref="myMap"
            :zoom="mapOptions.zoom"
            :center="mapOptions.center"
            @ready="onReady"
        >
            <l-tile-layer
                :url="mapOptions.url"
                :attribution="mapOptions.attribution"
            />

            <l-marker v-for="job in jobs.data" 
                :key="job.reference" 
                :lat-lng="[job.address.lat, job.address.lng]" 
                @click="$emit('job-marker-clicked', job.uuid)"
            > 
                <l-icon icon-url="/images/markers/map-pin-primary.png"
                    :tooltip-anchor="[10, -25]">
                </l-icon>

                <l-tooltip style="width: 200px;">
                    <h6 class="font-weight-bolder">{{ job.address.city }}<br>{{ job.address.postcode }}</h6>
                    <p class="text-muted text-wrap">{{ job.description }}</p> 
                </l-tooltip>
            </l-marker>

            <l-marker :lat-lng="[auth.address.lat, auth.address.lng]">
                <l-icon icon-url="/images/markers/map-pin-success.png"
                    :popup-anchor="[0, -30]">
                </l-icon>

                <l-popup>Your Current Location</l-popup>
            </l-marker>
        </l-map>
    </div>  
</template>

<script>
import { latLng } from "leaflet";

export default {
    props: {
        jobs: Object,
        auth: Object
    },

    data () {
        return {
            show: false,
            map: null,
            mapOptions: {
                zoom: 7,
                center: [],
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            }
        }
    },

    created () {
        if (this.jobs.meta.total == 1) {
            const jobAddress = this.jobs.data[0].address;
            this.mapOptions.center = latLng(jobAddress.lat, jobAddress.lng);  
        } else {
            const authAddress = this.auth.address;
            this.mapOptions.center = latLng(authAddress.lat, authAddress.lng); // London
        }
    },

    methods: {
        onReady() {
            this.map = this.$refs.myMap.mapObject;
        },
    }
}
</script>