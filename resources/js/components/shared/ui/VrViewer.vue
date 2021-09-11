<template>
    <div class="panorama-viewer">
        <Pano :source="source" id="pan-viewer"></Pano>
    </div>
</template>

<script>
    import {Pano} from 'vuejs-vr';
    export default {
        name: "VrViewer",
        props: {
            source: {
                type: String,
                default: ''
            }
        },
        components: {
            Pano
        }
    }
</script>

<style >
    .panorama-viewer{
        width: 100%;
        height: 268px;
    }

    #pan-viewer{
        width: 100%;
        height: 100%;
        max-width: 100%;
        max-height: 100%;
    }
</style>
