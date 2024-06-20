@extends ('layouts.master')
@section('title','公告系統')
@section('content')


<div class="container">
       
            <div class="row">
                <div class="col-12">
                <h2>編輯公告</h2>
           <a href="{{route('posts.index')}}" class="btn btn-success btn-sm">返回</a>
            </div>
            <div class="col-12">
              <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="form-group">
              <label for="title">標題</label>
              <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
              </div>
              <div class="form-group">
              <label for="content">內容</label>
              <textarea name="content" class="form-control"  id="content" >{{$post->content}}</textarea >
              <div class="form-group">
              <label for="files">附件</label>
              <input type="file" class="form-control" name="files" id="files" multiple">
              </div>
              <button type="submit" class=" btn btn-primary btn-sm" >儲存</button>
</form>
</div>
              </div>
              </div>
            </div>
            @endsection
