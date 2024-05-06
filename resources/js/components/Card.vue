<template>
    <div class="d-flex" @click="emit('addToCart',card)">
        <div class="item-img">
            <img :src="img"/>
        </div>
        <div class="list-item-descr">
            <h2>{{ title }}</h2>
            <p>{{ desc }}</p>
            <ul>
                <li v-for="tag in tags" :key="tag.id">
                    {{ tag.title }}
                </li>
            </ul>
            <div class="company">
                <img class="logo" :src="logo"/>
                <a :href="link"
                ><p>{{ linkTitle }}</p></a
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, onMounted} from 'vue'

defineProps({
    img: String,
    title: String,
    desc: String,
    tags: Array,
    logo: String,
    link: String,
    linkTitle: String,
    onClickAdd: Function,
    card: Array,
});
const emit = defineEmits(['addToCart']);

</script>

<style scoped>
.logo {
    width: 25px;
    height: 25px;
}
</style>
