<template>
    <div>
        <multi-list-select :list="data"
                           :selected-items="selectedItems"
                           :option-value="value"
                           :option-text="text"
                           placeholder="Выберите элементы"
                           @select="onSelect">
        </multi-list-select>
        <div v-for="item in selectedItems">
            <input type="hidden" v-model="item[value]" :name="name + '[]'">
        </div>
    </div>
</template>

<script>
    import {MultiListSelect} from 'vue-search-select'

    export default {
        props: ['items', 'value', 'text', 'name', 'default'],
        data() {
            return {
                data: JSON.parse(this.items),
                searchText: '',
                selectedItems: [],
                lastSelectItem: {}
            }
        },
        mounted() {

            if (this.default) {
                let def = JSON.parse(this.default)
                if (Array.isArray(def)) {
                    for (let key in def) {
                        console.log(def[key]);
                        let found = this.data.filter(obj => {
                            return obj[this.value] == def[key]
                        })[0]
                        if (found) {
                            this.selectedItems.push(found)
                        }
                    }
                } else {
                    this.selectedItems.push(def)
                }
            }
        },
        methods: {
            onSelect(items, lastSelectItem) {
                this.selectedItems = items
                this.lastSelectItem = lastSelectItem
            }
        },
        components: {
            MultiListSelect
        }
    }
</script>
