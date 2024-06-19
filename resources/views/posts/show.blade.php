@extends('layouts.master')
@section('title','首頁')
@section('content')
 <h2>{{$post->title}}</h2>
 <p>點閱數:{{$post->views}}</p>
 <a href="{{route('posts.index')}}" class="btn btn-secondary btn-sm">返回</a>
<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">編輯</a>
<a href="" class="btn btn-danger btn-sm" onclick="document.getElementById('delete').submit()">刪除</a>
    <form method="post" action="{{route('posts.destroy',$post->id)}}" id="delete">
        @csrf
        {{method_field('DELETE')}}
    </form>
    <div class="col-12">
    <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">

                    {{$post->content}}
                    </div>
                </div>
                </div>
            </div>
            </div>
@endsection
