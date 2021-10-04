<template>
    <div>
        <input type="text" hidden  :name="name" v-model="image.uploadPath">
        <vue-dropzone
            ref="imageInput"
            :options="dropzoneOptions"
            id="imageInput"
            @vdropzone-file-added="fileAdded"
            @vdropzone-removed-file="fileRemoved"/>
    </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';
    import config from "../../../config";
    import FileUploadHandler from "../../FileUploadHandler";
    export default {
        name: "SingleImageInput",
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
            formId: {
                type: String,
                default: 'formEdit'
            },
            edit: {
                type: Boolean,
                default: false
            },
            editObj: {
                type: Object,
                required: false
            },
            data: {
                type: Array,
                required: false
            }
        },
        mounted(){
            if (this.edit){
                // let file = {size: 150, name: item, type: "image/png", index: 1};
                // let url = this.$config.AppUrl+'/'+item;
                // this.$refs.imageInput.manuallyAddFile(file,url);
            }

        },
        data(){
            return {
                dropzoneOptions: {
                    url: config.AppUrl+'/images/asia-farm-logo.ico',
                    thumbnailWidth: 150,
                    maxFilesize: 8,
                    duplicateCheck: true,
                    acceptedFiles: 'image/*',
                    uploadMultiple: true,
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="mdi mdi-image"></i> '+this.placeholder+' ',
                    headers: { "My-Awesome-Header": "header value" }
                },
                image: {
                    name: null,
                    uploadPath: null
                },
                form: null
            }
        },
        methods: {
            fileAdded(file){
                let data = new FormData();
                data.append('image',file);
                let v = this;

                axios.post(config.AppUrl+'/api/file/post',data).then(function (response) {
                    console.log(response.data.data);
                    if (response.data.code === 200){
                        v.image.name = file.name;
                        v.image.uploadPath = response.data.data;
                    }
                });
            },
            fileRemoved(file){
                if (file.name === this.image.name){
                    let data = new FormData();
                    data.append('url',this.image.uploadPath);
                    let v = this;
                    axios.post(config.AppUrl+'/api/file/remove',data).then(function (response) {
                        console.log(response);
                        if (response.data.data.code === 200){
                            v.image.name =null;
                            v.image.uploadPath = null;
                        }
                    });
                }
            },
        }
    }
</script>

<style scoped>

</style>
