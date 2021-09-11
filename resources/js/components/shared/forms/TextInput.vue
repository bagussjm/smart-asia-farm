<template>
    <input :type="type" class="form-control" :id="id" :name="name" :placeholder="placeholder" :value="value">
</template>

<script>
    export default {
        name: "TextInput",
        props: {
            type: {
                type: String,
                default: 'text'
            },
            id: {
                type: String,
                default: ''
            },
            name: {
                type: String,
                default: ''
            },
            placeholder: {
                type: String,
                default: ''
            },
            value: {
                type: String,
                default: null
            }
        }
    }
</script>

<style scoped>

</style>
