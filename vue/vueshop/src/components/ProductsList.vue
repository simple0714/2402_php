<template>
    <!-- 상품 리스트 -->
   <div>
    <slot></slot>
    <div v-for="item in props.products" :key="item.productName">
      <h4 @click="$emit('myOpenModal', item)">{{ item.productName }}</h4>
      <p>{{item.price }}원</p>
    </div>
  </div>
  <ProvideTest/>
</template>
<script setup>
import { defineProps } from 'vue';
import ProvideTest from './ProvideTest.vue';

const props = defineProps({
    'products':Array
});

</script>