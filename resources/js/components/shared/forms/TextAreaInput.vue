<template>
    <textarea :name="name" :id="id" cols="3" rows="5" :placeholder="placeholder" class="form-control">{{value}}</textarea>
</template>

<script>
    export default {
        name: "TextAreaInput",
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
