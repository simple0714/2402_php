<template>
  <div class="form-box">
    <h3 class="form-title">회원가입</h3>
    <input v-model="account" type="text" name="account" placeholder="아이디">
    <input v-model="password" type="password" name="password" placeholder="비밀번호" autoComplete="off">
    <input v-model="password_chk" type="password" name="password_chk" placeholder="비밀번호 확인" autoComplete="off">
    <input v-model="name" type="text" name="name" placeholder="이름" autoComplete="off">
    <div class="radio-box">
      <div>
        <label for="male">남자</label>
        <input v-model="gender" type="radio" name="gender" id="male" value="male">
      </div>
      <div>
        <label for="female">여자</label>
        <input v-model="gender" type="radio" name="gender" id="female" value="female">
      </div>
    </div>
    <input @change="onFileChange" type="file" name="profile" accept="image/*">
    <hr>
    <button @click="$store.dispatch('register', formData)" class="btn btn-submit btn-bg-black">회원가입</button>
    <button @click="$router.back()" class="btn btn-submit">취소</button>
  </div>
</template>

<script>

</script>

<style>

</style>