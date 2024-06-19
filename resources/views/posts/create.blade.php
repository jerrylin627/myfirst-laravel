@extends('layouts.master')
@section('titile','首頁')
@section('content')
 <h2>新增公告</h2>
    <a href="{{route('posts.index')}}" class="btn btn-secondary btn-sm">返回</a>

    <div class="col-12">
      @if ($errors->any())
      <div class="alert alert-danger alert dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          <strong>警告!</strong>請修正以下表單錯誤:
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
      </div>
      @endif
      <form method="post" action="{{route('posts.store')}}">
      @csrf
            <div class="form-group">
              <label for="title">標題</label>
              <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" >
              </div>
              <div class="form-group">
              <label for="content">內容</label>
              <textarea name="content" class="form-control"  id="content" value="{{old('content')}}" ></textarea >
              <div class="form-group">
              <label for="files">附件</label>
              <input type="file" class="form-control" name="files" id="files" multiple">
              </div>
              <button type="submit" class=" btn btn-primary btn-sm" >送出</button>
      </form>
    </div>

@endsection
