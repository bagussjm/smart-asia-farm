<template>
    <a :href="url" class="btn btn-primary">
        <i class="ti ti-plus"></i>
        TAMBAH
    </a>
</template>

<script>
    export default {
        name: "AddButton",
        props: {
            url: {
                type: String,
                default: '#'
            }
        }
    }
</script>

<style scoped>

</style>
