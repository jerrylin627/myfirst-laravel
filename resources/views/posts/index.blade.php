@extends('layouts.master')
@section('title','首頁')
@section('content')
 <h2>最新公告</h2>
    <a href="{{route('posts.create')}}" class="btn btn-success btn-sm">新增公告</a>
    <div class="col-12">
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th>
                                發表時間
                            </th>
                            <th>
                                標標題
                            </th>
                            <th>
                                發表人
                            </th>
                            <th>
                                點閱數
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                {{$post->created_at}}
                            </td>
                            <td>
                            <a href="{{route('posts.show',$post->id)}}">
                            {{$post->title}}</a>
                            </td>
                            <td>
                                {{$post->user_id}}
                            </td>
                            <td>
                                {{$post->views}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               {{$posts->Links()}}
                </div>
            </div>
            </div>
@endsection
