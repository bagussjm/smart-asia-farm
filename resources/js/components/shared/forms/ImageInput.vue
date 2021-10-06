<template>
    <div>
        <input type="text" :name="name" :value="image.url"  v-for="image in images">
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
    export default {
        name: "ImageInput",
        components: {
            vueDropzone: vue2Dropzone,
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
            tableName: {
                type: String,
                default: ''
            },
            editObj: {
                type: Object,
                required: false
            },
            data: {
                type: Array,
                default: [],
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
                if (this.data){
                    let v = this;
                    v.data.map((item) => {
                        let storagePath = '/public/'+v.tableName+'/';
                        let file = {size: 150, name: item, type: "image/png", index: 1};
                        let url = this.$config.AppUrl+'/'+item;
                        this.$refs.imageInput.manuallyAddFile(file,url);
                        v.$dzImgPush(
                            file,
                            item,
                            true,
                            storagePath,
                            v.images
                        )
                    });
                }
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
                images: []
            }
        },
        methods: {
            fileAdded(file){
                if (this.isManual(file)){
                    console.log(file);
                }else{
                    this.postAndPushFile(file);
                }
            },
            fileRemoved(file){
                if (this.isManual(file)){
                    this.pullAndUpdateTable(file);
                }else {
                    this.pullAndRemoveFile(file);
                }
            },
            isManual(file){
                return file.manuallyAdded !== undefined;
            },
            getFilePath(file){
                let fileIndex = this.images.findIndex(f => f.name === file.name);
                return this.images[fileIndex].url;
            },
            postAndPushFile(file){
                let v = this;
                let storagePath = 'public/'+v.tableName+'/';
                let formData = new FormData();
                formData.append('image',file);
                formData.append('storage',storagePath);
                axios.post(config.AppUrl+'/api/file/post',formData).then(function (response) {
                    if (response.data.code === 200){
                        let url = response.data.data;
                        v.$dzImgPush(
                            file,
                            url,
                            false,
                            storagePath,
                            v.images
                        );
                    }
                });
            },
            pullAndRemoveFile(file){
                let v = this;
                let formData = new FormData();
                formData.append('storage',v.getFilePath(file));
                axios.post(config.AppUrl+'/api/file/remove',formData)
                    .then(function (response) {
                        if (response.data.code === 200){
                            v.$dzImgPull(file,v.images)
                        }
                    });
            },
            pullAndUpdateTable(file){
                let v = this;
                let formData = new FormData();
                formData.append('table',v.tableName);
                formData.append('column',v.column);
                formData.append('storage',v.getFilePath(file));
                formData.append('id',v.editObj.id);
                axios.post(config.AppUrl+'/api/file/pull',formData)
                    .then(function (response) {
                        console.log(response);
                        if (response.data.code === 200){
                            v.$dzImgPull(file,v.images)
                        }
                    });
            }
        }
    }
</script>

<style scoped>

</style>
