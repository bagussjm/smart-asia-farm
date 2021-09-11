<template>
    <div>
        <input type="text" hidden :name="name" v-model="dateValue" >
        <VueCtkDateTimePicker
            :only-date="true"
            :label="placeholder"
            :hint="placeholder"
            v-model="dateValue"
            :auto-close="true"
            :no-button-now="true"
            format="YYYY-MM-DD"
            output-format="YYYY-MM-DD"
            :input-size="size"
            :min-date="minDate"
            button-color="#02a499"
            :max-date="maxDate"
            required
        ></VueCtkDateTimePicker>
    </div>
</template>

<script>
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    export default {
        name: "DateInput",
        props: {
            name: {
                name: {
                    type: String,
                }
            },
            placeholder: {
                type: String,
                default: 'Isikan Tanggal'
            },
            size: {
                type: String,
                default: 'sm'
            },
            minDate: {
                type: String,
                default: '1950-01-01'
            },
            maxDate: {
                type: String,
                default: '-'
            }
        },
        components: {
            VueCtkDateTimePicker
        },
        data(){
            return {
                dateValue: null
            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
