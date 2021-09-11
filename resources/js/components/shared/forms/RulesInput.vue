<template>
    <div class="row">
        <div class="col-11">
            <input type="text"
                   class="form-control"
                   :name="name"
                   :id="id"
                   :placeholder="placeholder"
                   :value="value"
            >
        </div>
        <div class="col-1">
            <button class="btn btn-danger " type="button" v-on:click="deleteComp(compId)">
                <i class="mdi mdi-delete-circle"></i>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RulesInput",
        props: {
            type: {
                type: String,
                default: 'text'
            },
            id: {
                type: String,
                default: ''
            },
            compId: {
                type:Number,
                default: -1
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
        },
        methods: {
            deleteComp(id){
                this.$emit('deleteComp',id);
            }
        }
    }
</script>

<style scoped>

</style>
