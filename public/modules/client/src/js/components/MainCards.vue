<template>
    <div class="dancers-profiles">
        <div class="dancer-profile-container"
             v-for="member in JSON.parse(members)"
             :key="member.id"
             @mouseenter="enter"
             @mousemove="move"
             @mouseleave="leave">
            <div class="dancer-profile-avatar">

                <div class="cardSVGArrow arrowHidden" @click="cardClick(member)">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         id="Capa_1" x="0px" y="0px" viewBox="0 0 31.49 31.49"
                         style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                        <path style="    fill: rgb(255, 255, 255);"
                              d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111  C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587  c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
                     </svg>
                </div>
                <div class="dancer-profile-discription">{{member.first_name}} {{member.surname}}</div>
                <div class="dancer-profile-image"
                     :style="{backgroundImage: 'url(' + member.image + ')'}"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MainCards",
        props: ['coefficient', 'members'],
        data() {
            return {
                container: null,
                avatar: null,
            }
        },
        methods: {
            enter(e) {
                this.container = e.target
                this.avatar = this.container.getElementsByClassName('dancer-profile-avatar')[0]

                let coords = this.calculate(e)
                this.container.style.zIndex = 1
                this.avatar.style.trasition = "all .3s ease"
                this.avatar.style.transform = "perspective(450px)  rotateX(" + coords.x + "deg) rotateY(" + coords.y + "deg) scale3d(1.05, 1.05, 1.05)"
            },
            move(e) {
                let coords = this.calculate(e);
                this.container.style.zIndex = 1
                this.avatar.style.transition = ""
                this.avatar.style.transform = "perspective(450px)  rotateX(" + coords.x + "deg) rotateY(" + coords.y + "deg) scale3d(1.05, 1.05, 1.05)"
            },
            leave() {
                this.container.style.zIndex = "auto"
                this.avatar.style.transition = "all .3s ease"
                this.avatar.style.transform = "rotateX(" + 0 + "deg) rotateY(" + 0 + "deg) scale3d(1, 1, 1)"
            },
            calculate(event) {
                let rect = this.container.getBoundingClientRect();
                let XRel = event.pageX - (rect.left + window.scrollX);
                let YRel = event.pageY - (rect.top + window.scrollY);
                let width = this.container.offsetWidth;
                let height = this.container.offsetHeight;
                let XAngle = -(0.5 - (YRel / height)) * this.coefficient;
                let YAngle = (0.5 - (XRel / width)) * (this.coefficient / 2);

                return {
                    x: XAngle,
                    y: YAngle
                }
            },
            cardClick(member) {
                this.$root.$emit('selectedCard', member)
            }
        },
    }
</script>
