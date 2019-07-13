<template>
    <div class="form-group__field-file__container">
        <button type="button" @click="openManager" class="form-group__field-file">Выбрать</button>
        <img :src="url" :alt="fileName" class="form-group__field-file__image">
        <input type="hidden" v-model="url" :name="name">
    </div>
</template>

<script>
    export default {
        name: "File",
        props: ['name', 'default'],
        data(){
          return {
              fileUrl: this.default ? this.default : '',
              fileName: '',
          }
        },
        methods: {
            lfm(options, cb){
                let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=1200,height=900');
                window.SetUrl = cb;
            },
            openManager(){
                this.lfm({type: 'image'}, (url, path) => {
                    this.fileUrl = url[0].url
                    this.fileName = url[0].name
                });
            }
        },
        computed: {
            url: function () {
                return this.fileUrl ?  this.fileUrl.replace(/^.*\/\/[^\/]+/, '') : ''
            }
        }
    }
</script>


