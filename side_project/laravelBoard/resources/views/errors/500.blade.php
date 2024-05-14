@extends('inc.layout')
{{-- 타이틀 --}}
@section('title', '에러페이지')
{{-- 바디에 vh 클래스 부여 --}}
@section('bodyClassVh', 'vh-100')
    {{-- <body class="vh-100">
@endsection --}}
{{-- 메인 --}}
@section('main')
<main class="d-felx justify-content-center align-items-center h-75">
    <div>
        <h2>500 에러</h2>
        <p>정상적으로 처리되지 않았습니다.</p>
        <p>잠시 후 다시 시도해 주십시오.</p>
        <a href="{{route('get.login')}}">로그인 페이지로 돌아가기</a>
    </div> 
</main>
@endsection