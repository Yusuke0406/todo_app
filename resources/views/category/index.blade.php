@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center h1">CATEGORY</h1>
    <!-- エラーメッセージ -->
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    <form action="/category/store" method="POST">
    {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-sm-8">
            <input type="textarea" class="form-control" id="cat_name"  name="cat_name" placeholder="カテゴリー追加">
          </div>
          <div class="form-group col-sm-1">
            <input type="button" value="Speak" class="form-control btn-secondary" onclick="rec.start()">
          </div>
          <div class="form-group col-sm-2">
            <button type="submit" class="btn btn-success btn-block">追加</button>
          </div>
        </div>
    </form>
    <div class="row">
    @foreach ($categories as $category)
      <div class="col col-4 py-5 px-lg-5 bg-primary border rounded text-white text-center">
        <a href="{{ action('TaskController@showList', $category->id)}}"　class="text-white"> {{$category->cat_name}} </a>
        <form method="GET" action="/category/delete/{{$category->id}}">
          {{ csrf_field() }}
          <input type="submit" value="削除" class="btn btnedit  btn-outline-danger btn-sm" onclick='return confirm("君は本当に削除するつもりかい？");'>
        </form>
      </div>
      @endforeach
    </div>
  </div>
@endsection