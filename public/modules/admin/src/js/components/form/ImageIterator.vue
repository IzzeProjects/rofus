<template>
    <div class="form-group__iterator-image">
        <div v-show="images.length === 0">Нет элементов</div>

        <draggable v-model="images">
            <transition-group type="transition">
                <div v-for="(image, index) in images"
                     :key="image.id"
                     class="form-group__iterator-image_container">
                    <div class="form-group__iterator-drag"></div>
                    <file
                        :name="'images[' + index + '][image]'"
                        :default="image.image"
                    >
                    </file>
                    <input
                        :name="'images[' + index + '][name]'"
                        v-model="image.name"
                        type="text"
                        class="form-group__field iterator-image-name">
                    <input type="hidden" v-model="image.id" :name="'images[' + index + '][id]'">
                    <button
                        class="form-group__field-file"
                        type="button"
                        @click="removeIterate(index)"
                    >Удалить
                    </button>
                </div>
            </transition-group>
        </draggable>
        <button class="form-group__field-file field-file-iterator" type="button" @click="addIterate">Добавить</button>
    </div>
</template>

<script>
    import File from './File'
    import draggable from 'vuedraggable'

    export default {
        components: {
            File, draggable
        },
        props: ['default'],
        data() {
            return {
                images: JSON.parse(this.default),
                currentIndex: 1
            }
        },
        methods: {
            addIterate() {
                this.currentIndex++;
                this.images.push({id: this.currentIndex})
            },
            removeIterate(index) {
                this.images.splice(index, 1)
            }
        },
        mounted() {
            if (this.images.length > 0)
                this.currentIndex = Math.max.apply(Math, this.images.map(function (o) {
                    return o.id;
                }));
        },
        name: "ImageIterator"
    }
</script>
