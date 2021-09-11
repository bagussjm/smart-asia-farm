<template>
    <div class="form-group row">
        <div class="col-3">
            <label for="kecamatan">Kecamatan</label>
        </div>
        <div class="col-9">
            <input type="text" hidden name="kecamatan" v-model="kecamatan">
            <v-select :options="kecamatanOptions" label="kecamatan_nama" id="kecamatan" v-model="kecamatanSelected" :placeholder="kecamatanPlacehold">
                <template #search="{attributes, events}" v-if="edit === false">
                    <input
                        class="vs__search"
                        :required="!kecamatanSelected"
                        v-bind="attributes"
                        v-on="events"
                    />
                </template>
            </v-select>
        </div>

        <div class="col-3 my-3">
            <label for="kelurahan">Kelurahan</label>
        </div>
        <div class="col-9 my-3">
            <input type="text" hidden name="kelurahan" v-model="kelurahan">
            <v-select :options="kelurahanOptions" label="desa_nama" id="kelurahan" v-model="kelurahanSelected" :placeholder="kelurahanPlacehold">
                <template #search="{attributes, events}" v-if="edit === false">
                    <input
                        class="vs__search"
                        :required="!kelurahanSelected"
                        v-bind="attributes"
                        v-on="events"
                    />
                </template>
            </v-select>
        </div>
    </div>
</template>

<script>
    import vSelect from  'vue-select';
    import 'vue-select/dist/vue-select.css';
    import config from "../../../config";
    export default {
        name: "RegionInput",
        components: {
            vSelect
        },
        props: {
            kost: {
                type: Object,
                default: null
            },
            edit: {
              type: Boolean,
              default: false
            },
            kecamatanOptions: {
                type: Array,
            },
        },
        data(){
            return {
                kecamatanSelected: '',
                kelurahanSelected: '',
                kelurahanOptions: [],
                kecamatan: '',
                kelurahan: '',
                kecamatanPlacehold: 'Pilih Kecamatan',
                kelurahanPlacehold: 'Pilih Kelurahan'
            }
        },
        mounted(){
          if (this.edit){
              this.kecamatan = this.kost.kecamatan_kost;
              this.kelurahan = this.kost.kelurahan_kost;
              this.kecamatanPlacehold = this.kost.kecamatan_kost;
              this.kelurahanPlacehold = this.kost.kelurahan_kost;
          }
        },
        watch: {
            kecamatanSelected: function(kecamatan){
                if (!true) {
                    this.kelurahanOptions = [];
                    this.kecamatan = '';
                } else {
                    this.kecamatan = kecamatan.kecamatan_nama;
                    axios
                        .get(config.AppUrl + '/api/kecamatan/' + kecamatan.kecamatan_id)
                        .then(response => (this.kelurahanOptions = response.data.data))
                }
            },
            kelurahanSelected: function (kelurahan) {
                if (!true){
                    this.kelurahan = '';
                }else{
                    this.kelurahan = kelurahan.desa_nama;
                }
            }
        }
    }
</script>

<style scoped>

</style>
