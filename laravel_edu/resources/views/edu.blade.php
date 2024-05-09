{{-- 상속 --}}
@extends('layout.layout')

{{-- @section : 부모템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '에듀')

{{-- @section ~ @endsection : 처리해야할 코드가 많을 경우 범위를 지정해서 삽입 --}}
@section('main')
    <main>
        <h2>자식 템플릿 메인.</h2>
    </main>
@endsection

@section('show')
<h2>자식 show 입니다</h2>
<h3>자식쇼</h3>
@endsection


{{-- @if : 조건문 --}}
{{-- 상속관계를 가지고 있는 것보다 스스로 가지고 있는 것이 먼저 작동된다
    따라서 section안에 if문을 넣거나 주의해서 사용해야 한다.
    --}}
@if($gender === 'F') 
    <span>성별 : 여자</span>
@elseif($gender === 'M')
    <span>성별 : 남자</span>
@else
    <span>성별 : 기타</span>
@endif

<hr>
{{-- 반복문 --}}
{{-- @for : for반복문 --}}
@for($i = 0; $i < 5; $i++)
    <span>for {{$i}}</span>
@endfor

<hr>
{{-- @foreach ~ @endforeach : foreach 반복문 --}}
<h2>foreach</h2>
{{-- $loop : foreach, forelse에서 루프의 정보를 담고 있는, 자동으로 생성되는 객체 --}}
@foreach($data as $key => $val)
    <h4>남은 루프 횟수 : {{$loop->remaining}}</h4>
    <span style="color:blue">{{$key. " : ".$val}}</span>
    <br>
@endforeach
<br>
<hr>
<h2>foreach 다른 예제</h2>
@foreach($data as $key => $val)
    @if($loop->odd)
    <span>{{$key. " : ".$val}}</span>
    @else
    <span style="color:red">{{$key. " : ".$val}}</span>
    @endif
    <br>
@endforeach

{{-- @forelse ~ @empty ~ @endforelse :
    루프를 할 데이터의 길이가 1 이상이면 @forelse의 처리,
    배열의 길이가 0이면 @empty의 처리를 합니다.
    --}}
<h2>forelse 문</h2>
@forelse($data as $key => $val)
<span>{{$key." : ".$val}}</span>
<br>
@empty
<span>빈 배열입니다.</span>
@endforelse
<hr>