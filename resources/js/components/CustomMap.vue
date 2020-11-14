<template>
    <div class="my-3" style="height: 400px; width: 100%">
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

            <l-marker v-for="job in jobs.data" :key="job.reference" :lat-lng="[job.address.lat, job.address.lon]" @click="$emit('job-marker-clicked', job.uuid)"> 
                <l-tooltip style="width: 200px;">
                    <h6 class="font-weight-bolder">{{ job.address.city }}<br>{{ job.address.postcode }}</h6>
                    <p class="text-muted text-wrap">{{ job.description }}</p> 
                </l-tooltip>
            </l-marker>
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
                zoom: 7,
                center: latLng(51.509865, -0.118092),
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