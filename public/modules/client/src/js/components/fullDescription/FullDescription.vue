<template>
    <div class="full-description-container"
         v-show="show">
        <div class="man-info-container">
            <div class="profile-container-full-description">
                <div class="dancer-profile-avatar">
                    <div class="dancer-profile-image"
                         :style="{backgroundImage: 'url(' + info.image + ')'}">
                    </div>
                </div>
            </div>
            <div class="man-info-hide-button">

            </div>
            <div class="man-info">
                <div class="man-main-info-container">
                    <div class="man-main-info">
                        <div class="man-fio">
                            <span>{{info.first_name}} {{info.surname}}</span>
                        </div>
                        <div class="man-age">
                            <span>Возраст: {{info.age}}</span>
                        </div>
                        <div class="man-city">
                            <span>Город: {{info.city}}</span>
                        </div>
                    </div>
                    <div class="man-society-info">
                        <div class="man-society-instagram">
                            <img src="https://images.vexels.com/media/users/3/131142/isolated/preview/42686c238da2892da4bdea221bada9a6-instagram-flat-icon-by-vexels.png"
                                 alt="" class="man-society-img">
                            <p class="man-society-name">Вконтакте</p>
                            <a :href="info.vk" class="man-society-url">{{info.vk}}</a>
                        </div>
                        <div class="man-society-vk">
                            <img src="https://images.vexels.com/media/users/3/131142/isolated/preview/42686c238da2892da4bdea221bada9a6-instagram-flat-icon-by-vexels.png"
                                 alt="" class="man-society-img">
                            <p class="man-society-name">Instagram</p>
                            <a :href="info.instagram" class="man-society-url">{{info.instagram}}</a>
                        </div>
                        <div class="man-society-facebook">
                            <img src="https://images.vexels.com/media/users/3/131142/isolated/preview/42686c238da2892da4bdea221bada9a6-instagram-flat-icon-by-vexels.png"
                                 alt="" class="man-society-img">
                            <p class="man-society-name">Facebook</p>
                            <a :href="info.facebook" class="man-society-url">{{info.facebook}}</a>
                        </div>
                    </div>

                </div>
                <div class="man-additional-info">
                    <div class="man-additional-info-header-container">
                        <span class="man-additional-info-header-text">О себе:</span>
                    </div>
                    <div class="man-additional-info-text-container">
                        <span class="man-additional-info-text">
                            {{info.info}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="man-images-slider">
                <carousel :perPage="3"
                          :autoplayTimeout='5000'
                          :autoplay="true"
                          :loop="true">
                    <slide v-for="image in info.images" :key="image.id">
                        <div class="main-images-slider-image"
                             :style="{backgroundImage: 'url(' + image.image + ')'}"
                        ></div>
                    </slide>
                </carousel>
            </div>
        </div>
    </div>
</template>

<script>
    import {Carousel, Slide} from 'vue-carousel';

    export default {
        components: {
            Carousel,
            Slide
        },
        data() {
            return {
                show: false,
                info: {},
            }
        },
        mounted() {
            this.$root.$on('selectedCard', (member) => {
                this.show = true
                this.info = member
            })
        },
        name: "FullDescription"
    }
</script>
