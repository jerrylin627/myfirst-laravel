@extends('layouts.master')
@section('titile','404錯誤')
@section('content')
<div class="row">
    <div class="col-12">
        <h2>404 找不到頁面</h2>
        <h4>錯誤提示:{{$exception->getMessage()}}</h4>
    </div>
</div>
    
@endsection