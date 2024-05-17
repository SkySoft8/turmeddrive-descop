<template>
    <div class="flex-col gap-4">
        <CardItem v-for="item in cart" 
        :key="item.id"
        :id= "item.user_id"
        :title="item.title"
        :tags="item.tags"
         />
    </div>
</template>

<script setup>
import { inject } from 'vue';
import CardItem from './CardItem.vue';

const {cart} = inject('cart');
</script>
