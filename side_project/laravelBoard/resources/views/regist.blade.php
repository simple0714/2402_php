@extends('inc.layout')

@section('title', '회원가입')

@section('script')
    <script src="/js/regist.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

@section('bodyClassVh', 'vh-100')
{{-- <body class="vh-100"> --}}
{{-- @endsection --}}
@section('main')
    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 300px" action="{{route('regist.store')}}" method="post">
            @csrf
            {{-- 에러 메세지 표시 --}}
            @if($errors->any())
            <div class="form-text text-danger">
                {{-- 에러 메세지 루프 처리 --}}
                @foreach($errors->all() as $error)
                <span>{{$error}}</span>
                <br>
                @endforeach
            </div>
            @endif

            <label for="email" class="form-label">이메일</label>
            <span id="print-chk-email"></span>
            <button id="btn-chk-email" type="button" class="btn btn-secondary float-end">중복 확인</button>
            <input type="text" class="form-control mb-3" id="email" name="email">

            <label for="password" class="form-label">비밀번호</label>
            <input type="password" class="form-control mb-3" id="password" name="password">
            {{-- <label for="password_chk" class="form-label">비밀번호 확인</label>
            <input type="password" class="form-control mb-3" id="password_chk" name="password_chk"> --}}

            <label for="name" class="form-label">이름</label>
            <input type="text" class="form-control mb-3" id="name" name="name">

            <button id="my-btn-complete" type="submit" disabled="disaled"  class="btn btn-dark ">완료</button>
            <a href="{{route('get.login')}}" class="btn btn-secondary float-end">취소</a>

        </form>
    </main>
@endsection