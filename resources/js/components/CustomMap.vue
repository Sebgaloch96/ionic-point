<template>
    <div class="my-3" style="height: 100%; width: 100%">
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

            <l-marker v-for="job in jobs.data" :key="job.reference" :lat-lng="[job.address.lat, job.address.lon]" > </l-marker>
        </l-map>
    </div>  
</template>

<script>
import { latLng } from "leaflet";

export default {
    props: {
        jobs: Object,
    },

    data () {
        return {
            show: false,
            map: null,
            mapOptions: {
                zoom: 5,
                center: latLng(47.41322, -1.219482),
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            }
        }
    },

    mounted () {
    },

    methods: {
        onReady() {
            console.log('Map Ready');
            
            this.map = this.$refs.myMap.mapObject;
        }
    }
}
</script>