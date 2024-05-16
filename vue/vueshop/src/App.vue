<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- props : 자식 컴포넌트에게 props 속성을 이용해서 데이터를 전달 -->
  <HeaderComponent 
    :navList="navList"
  />
  <div>
    <div v-for="(item) in products" :key="item.productName">
      <h4 @click="myOpenModal(item)">{{ item.productName }}</h4>
      <p>{{item.price }}원</p>
    </div>
  </div>

  <!-- 모달 -->
  <ModalDetail
    :products="products"
    :product="product"
    :flgModal="flgModal"
  />

</template>

<script setup>
import { ref, reactive } from 'vue';
import HeaderComponent from './components/HeaderComponent.vue'; //자식 컴포넌트 import
import ModalDetail from './components/ModalDetail.vue' //모달 디테일 import
//----------------------------
//데이터 바인딩
//----------------------------
const products = reactive([
  {productName: '바지', price: 10000, productContent: '편한 바지 입니다.', img: require('@/assets/img/바지.jpg')},
  {productName: '티셔츠', price: 5000, productContent: '편한 티셔츠 입니다.', img: require('@/assets/img/티셔츠.jpg')},
  {productName: '양말', price: 1000, productContent: '편한 양말 입니다.', img: require('@/assets/img/양말.jpg')}
]); 


//----------------------------
//헤더
//----------------------------
const navList = reactive([
  {listName: '홈'}
  ,{listName: '상품'}
  ,{listName: '기타'}
]);


//--------------------------------
//모달용
//--------------------------------
const flgModal = ref(false); //모달 표시용 플래그
let product = reactive({}); 
function myOpenModal(item) {
  flgModal.value = !flgModal.value;
  product = item;
}

</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

</style>
