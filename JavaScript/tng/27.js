// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [ 6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40 ];

let arr = [...ARR1];
arr.sort((a, b) => a - b );

console.log(arr);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5,7,3,4,5,1,2];
let result = ARR2.filter(val => val % 2 === 0);
let result2 = ARR2.filter(val => val % 2 !== 0)
let arr1 = result;
let arr2 = result2;

console.log(arr1);
console.log(arr2);

const EVEN = [];
const ODD = [];
ARR2.forEach(num =>{
    if(val % 2 === 0){
        EVEN[EVEN.length] = num;
    }else{
        ODD[ODD.length] = num;
    }
});
