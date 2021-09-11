<template>
    <div id="cost-map">

    </div>
</template>

<script>
    export default {
        name: "LocationMapView",
        props: {
            coordinate: {
                type: Object,
            },
            name: {
                type: String
            }
        },
        data(){
            return {
                marker: null
            }
        },
        mounted() {
            let position = {
                lat: parseFloat(this.coordinate.latitude),
                lng: parseFloat(this.coordinate.longitude)
            };
            this.$config.Map.load().then(() => {

                let map = new google.maps.Map(document.getElementById("cost-map"), {
                    center: position,
                    zoom: 18,
                    streetViewControl: false,
                    mapTypeControl: false
                });

                this.marker = new google.maps.Marker({
                    position: position,
                    map,
                    title: this.name
                });
            });
        }
    }
</script>

<style >
    #cost-map{
        width: 100%;
        height: 240px;
    }
</style>
