<template>
    <div class="row">
        <div class="col-12">
            <div style="display: none">
                <input
                    id="pac-input"
                    class="controls"
                    type="text"
                    placeholder="Tuliskan nama kost"
                    v-if="edit"
                    :value="kost.nama_kost"
                />
                <input
                    id="pac-input"
                    class="controls"
                    type="text"
                    placeholder="Tuliskan nama kost"
                    v-else
                />
            </div>
            <div id="cost-map">

            </div>
            <div id="infowindow-content">
                <span id="place-name" class="title"></span><br />
                <strong>Place ID</strong>: <span id="place-id"></span><br />
                <span id="place-address"></span>
            </div>
        </div>
        <input type="text" hidden name="koordinat[latitude]" v-model="coordinate.lat">
        <input type="text" hidden name="koordinat[longitude]" v-model="coordinate.lng">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="coordinateSet">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="coordinateSet = false">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Berhasil mendapatkan koordinat kost</strong>
            </div>
        </div>
        <div class="col-6 my-3">
            <input name="latitude" readonly :value="coordinate.lat" :class="coordinateSet ? 'is-valid' : ''" class="form-control"/>
        </div>
        <div class="col-6 my-3">
            <input name="longitude" readonly :value="coordinate.lng" :class="coordinateSet ? 'is-valid' : ''" class="form-control"/>
        </div>
        <div class="col-9">
            <span class="text-muted font-weight-light" style="font-size: 11px">Koordinat memudahkan kost anda ditemukan oleh pencari kost pada aplikasi melalui peta</span>
        </div>
    </div>
</template>

<script>
    import TextInput from "./TextInput";
    import config from "../../../config";

    export default {
        name: "MapCoordinateInput",
        props: {
          name: {
              type: String,
              default: ''
          },
          kost: {
              type: Object,
              default: null
          },
          edit: {
              type: Boolean,
              default: false
          }
        },
        components:{
            TextInput
        },
        data(){
            return {
                map: null,
                coordinate: {
                    lat: 0,
                    lng: 0
                },
                coordinateSet: false,
            }
        },
        mounted() {
            let center;
            if (this.edit){
                this.coordinate = {
                    lat: parseFloat(this.kost.koordinat_kost.latitude),
                    lng: parseFloat(this.kost.koordinat_kost.longitude)
                };
                center = this.coordinate;
            }else {
                center =  { lat: 0.4667485005901984, lng: 101.35593821688991 }
            }
            config.Map.load().then(() => {
                this.map = new google.maps.Map(document.getElementById("cost-map"), {
                    center: center,
                    zoom: 18,
                    streetViewControl: false,
                    mapTypeControl: false
                });

                const input = document.getElementById("pac-input");
                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo("bounds", this.map);
                // Specify just the place data fields that you need.
                autocomplete.setFields(["place_id", "geometry", "name", "formatted_address"]);
                this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                const infowindow = new google.maps.InfoWindow();
                const infowindowContent = document.getElementById("infowindow-content");
                infowindow.setContent(infowindowContent);
                const geocoder = new google.maps.Geocoder();
                const marker = new google.maps.Marker({ map: this.map });
                marker.addListener("click", () => {
                    infowindow.open(this.map, marker);
                });
                autocomplete.addListener("place_changed", () => {
                    infowindow.close();
                    const place = autocomplete.getPlace();

                    if (!place.place_id) {
                        return;
                    }
                    geocoder.geocode({ placeId: place.place_id }, (results, status) => {
                        if (status !== "OK" && results) {
                            window.alert("Gagal menetapkan koordinat : " + status);
                            return;
                        }
                        this.coordinateSet = true;
                        this.coordinate.lat = results[0].geometry.location.lat();
                        this.coordinate.lng = results[0].geometry.location.lng();
                        this.map.setZoom(18);
                        this.map.setCenter(results[0].geometry.location);
                        // Set the position of the marker using the place ID and location.
                        marker.setPlace({
                            placeId: place.place_id,
                            location: results[0].geometry.location,
                        });

                        marker.setVisible(true);
                        infowindowContent.children["place-name"].textContent = place.name;
                        infowindowContent.children["place-id"].textContent = place.place_id;
                        infowindowContent.children["place-address"].textContent = results[0].formatted_address;
                        infowindow.open(this.map, marker);
                    });
                });
            });
        }
    }
</script>

<style >
    #cost-map{
        width: 100%;
        height: 250px;
    }

    .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    .controls:focus {
        border-color: #4d90fe;
    }

    #infowindow-content {
        display: inline;
    }
</style>
