//String 객체

let str = '문자열';
let str1 = String('문자열 정석');

//length : 문자열의 길이를 반환
console.log(str.length);

//charAt() : 특정 인덱스의 문자를 반환
str.charAt(3);

//indexOf() : 문자열에서 특정 문자열을 찾아 최초의 인덱스를 반환
//찾지 못하면 -1 반환
str = '안녕하세요. 안녕하세요.';
str.indexOf('녕');
const TEXT = '안';
if(str.indexOf(TEXT) < 0 ) {
    console.log('해당 문자열 없음');
}else {
    console.log(str.indexOf(TEXT));
}

//검색을 시작할 인덱스의 위치를 지정
console.log(str.indexOf('녕', 5));


//includes() : 문자열에서 특정 문자열을 찾아 true/false 반환
if(str.includes('하세요')) {
    console.log('검색 문자열 존재');
} else {
    console.log('검색 결과 없음');
}

//replace() : 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
str = 'abcdefgdede';
console.log(str.replace('de','안녕'));

//replaceAll() : 모든 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
str.replaceAll('de', '안녕');
console.log(str.replaceAll('de', '안녕'));

//substring() : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
str = '안녕하세요. JavaScript입니다';
console.log(str.substring(7,17));

str.substring(str.indexOf('JavaScript'), str.indexOf('JavaScript') + 'JavaScript'.length);

let pattern = '하세';
let patternIndex = str.indexOf(pattern);
str.substring(patternIndex, patternIndex + pattern.length);

//split() : separator를 기준으로 문자열을 잘라서 배열 요소로 담은 배열을 반환
str = '빵, 돼지숯불, 제육, 돈가스';
str.split(', '); // , 구분문자
str.split(', ', 2); //배열의 길이를 2로 제한

//trim() : 좌우의 공백을 제거해서 문자열 반환 메소드
str = '  aklvnjadjl   ';
str.trim();

//toUpperCase(), toLowerCase() : 알파벳을 대/소문자로 변환해서 반환
str = 'aBAqhaRQAad';
str.toUpperCase();
str.toLowerCase();