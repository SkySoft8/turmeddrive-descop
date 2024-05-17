<template>
    <div class="d-flex" @click="emit('addToCart',card,lists,newItem)">
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
            <p v-for="list in lists">
               <p v-if="list.user_id === card.user_id">{{ list }}</p> 
                <p v-for="item in newItem">
                    <p v-if="item.medical_todo_list_id === list.id && list.user_id === card.user_id">{{ item }}</p>
            </p>
            </p>

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
    lists:Array,
    newItem: Array
});
const emit = defineEmits(['addToCart']);

    
</script>

<style scoped>
.logo {
    width: 25px;
    height: 25px;
}
</style>
