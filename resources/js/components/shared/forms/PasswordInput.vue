<template>
    <div>
        <input :type="passwordType" class="form-control " :name="name" required>
        <input type="checkbox" id="switch1" switch="none" v-on:click="togglePassword">
        <label for="switch1" data-on-label="show" data-off-label="hide" class="mt-2"></label>
    </div>
</template>

<script>
    export default {
        name: "PasswordInput",
        props:{
            name: {
                type: String,
                default: 'password'
            }
        },
        data(){
            return{
                passwordType: 'password'
            }
        },
        methods:{
            togglePassword: function () {
                if (this.passwordType === 'password'){
                    this.passwordType = 'text';
                }else{
                    this.passwordType = 'password'
                }
            }
        }
    }
</script>

<style scoped>

</style>
