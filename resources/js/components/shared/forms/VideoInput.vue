<template>
    <div>
        <input type="text" hidden  :name="name" :value="video.url" v-for="video in videos" >
        <vue-dropzone
            ref="videoInput"
            :options="dropzoneOptions"
            id="videoInput"
            placeholder="Unggah Video"
            @vdropzone-file-added="fileAdded"
            @vdropzone-removed-file="fileRemoved"/>
    </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';
    import config from "../../../config";
    export default {
        name: "VideoInput",
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
                type: Array,
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
               if (this.video){
                   this.data.map((item,index) => {
                       let file = {size: 150, name: item, type: "video/*", index: index};
                       let url = this.$config.AppUrl+'/'+item;
                       this.$refs.videoInput.manuallyAddFile(file,url);
                   });
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
                    acceptedFiles: 'video/*',
                    uploadMultiple: false,
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="mdi mdi-upload"></i> '+this.placeholder+' ',
                    headers: { "My-Awesome-Header": "header value" }
                },
                videos: []
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
                            v.$dzImgPush(file,url,v.videos);
                        }
                    })
                }
            },
            fileRemoved(file){
                if (file.manuallyAdded !== undefined){
                    let formData = new FormData();
                    formData.append('url',file.name);
                    formData.append('column',this.column);
                    axios({
                        url: config.AppUrl+'/api/video/'+this.kost.id_kost+'/pull',
                        method: 'POST',
                        data: formData
                    }).then(function (response) {
                        console.log(response.data);
                    });

                }else {
                    this.$dzImgPull(file,'/api/video/remove',this.videos);
                }
            },
        }
    }
</script>

<style scoped>

</style>
