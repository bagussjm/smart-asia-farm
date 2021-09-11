<template>
    <div>
        <div class="mb-2">
            <component
                v-for="(repeater,index) in repeaters"
                :key="index"
                :is="repeater.type"
                :name="name"
                :id="repeater.type+'-'+index"
                :compId="repeater.id"
                :value="repeater.value"
                class="mb-3"
                :placeholder="(index+1)+'. '+placeholder"
                @deleteComp="deleteRepeater"
            />
        </div>
        <button class="btn  btn-primary btn-sm" type="button" v-on:click="addRepeater('RulesInput')">
            <i class="mdi mdi-plus-circle"></i>
        </button>
    </div>
</template>

<script>
    import RulesInput from "./RulesInput";
    export default {
        name: "BookRulesRepeater",
        components: {RulesInput},
        props: {
            name: {
                type: String,
                default: '',
                required: true
            },
            placeholder: {
                type: String,
                default: ''
            },
            edit: {
                type: Boolean,
                default: false
            },
            data: {
                type: Array,
            },
            kost: {
                type: Object,
                default: null
            },
        },
        mounted(){
          if (this.edit){
              if (this.data){
                  this.data.map((item,index) => {
                      this.addRepeater('RulesInput',item);
                  });
              }
          }else{
              this.addRepeater('RulesInput');
          }
        },
        data(){
            return {
                repeaters: [],
                counter: 0
            }
        },
        methods: {
            addRepeater(type,val = null){
                let id = this.counter++;
                this.repeaters.push({
                    type: type,
                    id: id,
                    value: val
                })
            },
            deleteRepeater(id)
            {
                let indexId =  this.repeaters.findIndex(f => f.id === id);
                this.repeaters.splice(indexId,1);
            }
        }
    }
</script>

<style scoped>

</style>
