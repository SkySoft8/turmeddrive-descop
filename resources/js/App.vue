<template>
    <div class="wrapper">
        <Drawer v-if="drawerOpen" />
        <Header  @openDrawer="openDrawer"/>

        <router-view></router-view>
        <footer>
            <div>
                <div class="menu">
                    <ul>
                        <li>
                            <router-link :to="{name:'med'}">Каталог</router-link>
                        </li>
                        <li>
                            <router-link :to="{name: 'ecosistem'}">О проекте</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'constaling'}">Консалтинг</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'contact'}">Контакты</router-link>
                        </li>
                    </ul>
                </div>
                <div class="media">
                    <router-link :to="{name: 'home'}"><img class="f-logo" src="assets//img/logo-l.png"></router-link>
                    <a href="https://vk.com/tourmeddr "><img src="assets/img/vk.svg"></a> 
                    <a href="https://t.me/turmeddriver"><img src="assets/img/telegram.svg"></a>
                </div>
            </div>

            <img class="payment-img" src="assets//img/payment.png">
        </footer>
    </div>
</template>

<script setup>
import CardItem from "./components/CardItem.vue";
import Drawer from "./components/Drawer.vue"
import Header from "./components/Header.vue"
import user from "./user";

import {ref, provide} from 'vue'

const drawerOpen = ref(false)
const cart=ref([])


const closeDrawer = () => {
    drawerOpen.value = false
}

const openDrawer = () => {
    drawerOpen.value = true 
}

const addToCart = (title) => {
    cart.value.push(title)
    console.log(title)
}

provide('cartActions', {
    closeDrawer,
    openDrawer,
    addToCart
}) 
</script>

<style>

@media (min-width: 481px) {
    .mob-menu-div {
        display: none;
    }
}

@media (max-width: 481px) {
    .div {
        display: none;
    }

    .menu ul li a ul:hover {
        display: block;
    }
}
</style>
