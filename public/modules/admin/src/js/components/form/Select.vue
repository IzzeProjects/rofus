<template>
    <div>
        <model-list-select :list="data"
                           v-model="objectItem"
                           :option-value="value"
                           :option-text="text"
                           placeholder="Выберите элемент">
        </model-list-select>
        <input type="hidden" :name="name" v-model="objectItem[value]">
    </div>
</template>

<script>
    import {ModelListSelect} from 'vue-search-select'

    export default {
        props: ['items', 'value', 'text', 'name', 'default'],
        data() {
            return {
                data: JSON.parse(this.items),
                objectItem: {}
            }
        },
        mounted() {
            this.objectItem = this.data[0]
            if(this.default){
                this.objectItem = this.data.filter(obj => {
                    return obj[this.value] == this.default
                })[0]
            }
        },
        components: {
            ModelListSelect
        }
    }
</script>
