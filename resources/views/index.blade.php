@extends('layouts.master')
@section('titile','首頁')
@section('content')
<div class="row">
    <div class="col-12">
        <h2>歡迎光臨{{ env('APP_NAME') }}</h2>
        <img src="{{asset('images/123.jpg')}}" >
    </div>
</div>
    
@endsection