<template>
    <Transition name="container">
        <div class="bg_black" v-if="props.flgModal">
            <div class="bg_white">
                <img :src="props.product.img">
                <h4>{{props.product.productName}}</h4>  
                <p>{{props.product.productContent}}</p>
                <p>{{props.product.price}}원</p>
                <p>총액 : {{props.product.price*cnt}}원</p>
                <input type="number" min="1" v-model="cnt">
                <br><br>
                <button @click="close">닫기</button>
            </div>
        </div>
    </Transition>
</template>
<script setup>
import { defineEmits, defineProps, ref } from 'vue';


const props = defineProps({
    'product':Object
    ,'flgModal':Boolean
    
});
const emit = defineEmits(['myCloseModal']);

//총액 처리 부분
const cnt = ref(1);

function close() {
    cnt.value = 1;
    emit('myCloseModal', props.product.productName);
}
</script>
<style>
.container-enter-from {
    opacity : 0;
}
.container-enter-active {
    transition: 0.2s ease;
}
.container-enter-to {
    opacity : 1;
}

.container-leave-from {
    transform: translateX(0px);
}
.container-leave-active {
    transition: all 1.3s;
}
.container-leave-to {
    transform: translateX(4000px);
}
</style>