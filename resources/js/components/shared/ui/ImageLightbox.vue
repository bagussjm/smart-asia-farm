<template>
    <div class="row form-group">
        <CoolLightBox
            :items="items"
            :index="index"
            @close="index = null">
        </CoolLightBox>

        <div class="col-2 lb-container"
             title="Open Imagination"
             v-for="(image,imageIndex) in items"
             :key="imageIndex"
             @click="index = imageIndex"
        >
            <div class="gallery-popup" >
                <div class="project-item">
                    <div class="overlay-container">
                        <img :src="image" alt="img" class="gallery-thumb-img" width="100%" style="width: 100%;height: 104px!important;">
                    </div>
                </div>
            </div >
        </div>
    </div>
</template>

<script>
    import CoolLightBox from 'vue-cool-lightbox';
    import 'vue-cool-lightbox/dist/vue-cool-lightbox.min.css';

    export default {
        name: "ImageLightbox",
        components: {
            CoolLightBox
        },
        props: {
            images: {
                type: Array,
            }
        },
        data(){
            return {
                index: null,
                imagesSrc: this.images,
                items: [],
                icon: this.$config.AppUrl+'/images/kost-kita-icon.png'
            }
        },
        mounted() {
            if (this.images !== null){
                this.images.map((item,index) => {
                    this.items.push(
                        this.$config.AppUrl+'/'+item
                    );
                })
            }
        }
    }
</script>

<style >
    .lb-container:hover{
        cursor: pointer;
    }
</style>
