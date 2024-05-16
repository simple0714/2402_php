<!-- vueInit -->
<template>
    <!-- 헤더 -->
    <div class="nav">
        <a href="#" v-for="(item) in data.navList" :key="item.listName">{{ item.listName }}</a>
    </div>

</template>

<script setup>
import { defineProps } from 'vue';

const data = defineProps({
    'navList':Array
});
console.log(data);
</script>
<style>
    
</style>