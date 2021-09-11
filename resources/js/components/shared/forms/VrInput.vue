<template>
    <div>
        <input type="text" hidden  :name="name" v-model="vr[0].url" v-if="vr.length > 0">
        <input type="text" hidden :name="name"  v-else>
        <vue-dropzone
            ref="vrInput"
            :options="dropzoneOptions"
            id="vrInput"
            @vdropzone-file-added="fileAdded"
            @vdropzone-removed-file="fileRemoved"/>
    </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';
    import config from "../../../config";
    export default {
        name: "VrInput",
        components: {
            vueDropzone: vue2Dropzone
        },
        props: {
            name: {
                type: String,
                default: ''
            },
            placeholder: {
                type: String,
                default: ''
            },
            edit: {
                type: Boolean,
                default: false
            },
            kost: {
                type: Object,
                required: false
            },
            data: {
                type: String,
                required: false
            },
            column: {
                type: String,
                default: '',
                required: false
            }
        },
        mounted(){
          if (this.edit){
              if (this.data !== ''){
                  let file = {size: 150, name: this.data, type: "image/png", index: 1};
                  let url = this.$config.AppUrl+'/'+this.data;
                  this.$refs.vrInput.manuallyAddFile(file,url);
                  this.$dzImgPush(file,url,this.vr);
              }
          }
        },
        data(){
            return {
                dropzoneOptions: {
                    url: config.AppUrl+'/images/kost-kita-icon.png',
                    thumbnailWidth: 150,
                    maxFilesize: 15,
                    duplicateCheck: true,
                    acceptedFiles: 'image/*',
                    uploadMultiple: false,
                    maxFiles:1,
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="mdi mdi-upload"></i> '+this.placeholder+' ',
                    headers: { "My-Awesome-Header": "header value" }
                },
                vr: []
            }
        },
        methods: {
            fileAdded(file){
                if (file.manuallyAdded === undefined){
                    let data = new FormData();
                    data.append('video',file);
                    let v = this;

                    axios.post(config.AppUrl+'/api/video/post',data).then(function (response) {
                        console.log(response);
                        if (response.data.code === 200){
                            let url = response.data.data;
                            v.$dzImgPush(file,url,v.vr);
                        }
                    })
                }
            },
            fileRemoved(file){
                this.$dzImgPull(file,'/api/video/remove',this.vr);
            }
        }
    }
</script>

<style scoped>

</style>
