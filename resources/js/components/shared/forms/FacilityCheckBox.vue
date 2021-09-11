<template>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" checked
               class="custom-control-input"
               name="fasilitas[]"
               v-model="checked"
               :id="'fk'+facilityMaster.id_master_fasilitas"
               :value="facilityMaster.id_master_fasilitas">
        <label class="custom-control-label" :for="'fk'+facilityMaster.id_master_fasilitas">
            {{ facilityMaster.nama_fasilitas}}
        </label>
    </div>
</template>

<script>
    export default {
        name: "FacilityCheckBox",
        props: {
            facilityMaster: {
                type: Object,
            },
            kostId: {
                type: String
            }
        },
        data(){
            return {
                checked: this.facilityMaster.id_master_fasilitas
            }
        },
        watch: {
            checked: function (data) {
                if (data){
                    this.checked = this.facilityMaster.id_master_fasilitas
                }else{
                    let deleteUrl = this.$config.AppUrl+'/api/fasilitas-kost/'+this.kostId+'/delete';
                    let formData = new FormData();
                    formData.append('facility_master',this.facilityMaster.id_master_fasilitas);

                    axios.post(deleteUrl,formData)
                        .then(function (response) {

                        });
                }
            }
        }
    }
</script>

<style scoped>

</style>
