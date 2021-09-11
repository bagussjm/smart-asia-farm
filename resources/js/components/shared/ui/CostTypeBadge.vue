<template>
    <span :class="badge.color">{{badge.text}}</span>
</template>

<script>
    export default {
        name: "CostTypeBadge",
        props: {
            type: {
                type: String,
                default: 'putra',
                required: true
            }
        },
        data(){
          return {
              style: {
                  putra : {
                      color: 'badge badge-info badge-pill',
                      text: 'Kost Putra'
                  },
                  putri : {
                      color: 'badge badge-primary badge-pill',
                      text: 'Kost Putri'
                  },
                  campur : {
                      color: 'badge badge-success badge-pill',
                      text: 'Kost Putra/Putri'
                  }
              },
              badge: {

              }
          }
        },
        mounted() {
            this.badge = this.style[this.type];
        },
        methods: {
            badgeColor(type){

            }
        }
    }
</script>

<style scoped>

</style>
