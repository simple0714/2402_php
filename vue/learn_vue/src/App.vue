<template>
  <h1>테스트</h1>
  <p>{{ cnt }}</p>
  <button @click="cnt++">증가</button>
<main>
  <RouterLink to="login"><button>로그인</button></RouterLink>
  <RouterLink to="board"><button>게시판</button></RouterLink>
  <router-view></router-view>
  <button @click="movePath('/login')">JS 로그인</button>
  <button @click="movePath('/board')">JS 게시판</button>
  <!-- <button @click="flg = 0">로그인</button>
  <button @click="flg = 1">게시판</button>
  <loginComponent v-if="flg === 0"/>
  <BoardComponent v-if="flg === 1"/> -->
</main>
</template>

<script setup>
import { ref, onBeforeMount, onBeforeUnmount, onBeforeUpdate, onMounted, onUnmounted, onUpdated } from 'vue';
import router from './router';
// import BoardComponent from './components/BoardComponent.vue'
// import loginComponent from './components/loginComponent.vue'

//컴포넌트 전환용 플래그
// const flg = ref(0);

//--------------------
//js에서 vue route사용
//--------------------
function movePath(path) {
  // push(경로) : URL 히스토리를 추가하면서 URL 이동
  // router.push(path);

  // replace('경로') : URL 히스토리를 추가하지 않고 URL 이동
  router.replace(path);
}

const cnt = ref(0);
onBeforeMount(() => {
  console.log('비포 마운트');
});
onMounted(() => {
  console.log('마운티드');
});
onBeforeUpdate(()=> {
  console.log('비포 업데이트');
  if(cnt.value === 5) {
    cnt.value = 0;
  }
});
onUpdated(()=> {
  console.log('업데이티드');
  if(cnt.value === 1) {
    cnt.value = 3;
  }
});
onBeforeUnmount(()=> {
  console.log('비포 언마운트');
});
onUnmounted(()=> {
  console.log('언마운티드');
});
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
