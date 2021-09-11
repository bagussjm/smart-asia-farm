<template>
    <div>
        <money type="text" class="form-control" v-model="price" v-bind="money" >
        </money>
        <input type="text" hidden :name="name" v-model="price" v-if="price > 0">
        <input type="text" hidden :name="name"  v-else>

    </div>

</template>

<script>
    import {Money} from 'v-money';
    export default {
        name: "MoneyInput",
        components: {Money},
        props: {
            value: {
                type: Number,
                default: 0
            },
            name: {
                type: String,
                required: true
            }
        },
        data(){
            return {
                price: this.value,
                money: {
                    decimal: ',',
                    thousands: '.',
                    prefix: 'Rp ',
                    precision: 0,
                    masked: false /* doesn't work with directive */
                }
            }
        }
    }
</script>

<style scoped>

</style>
