@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center h1">WANT</h1>
      <!--　エラーメッセージ -->
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <!-- フラッシュメッセージ -->
      @if (session('flash_message'))
            <div class="flash_message bg-info text-center my-0 text-white">
                {{ session('flash_message') }}
            </div>
        @endif
    <form action="/want/store" method="POST">
    {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-sm-8">
            <label for="inputName" class="">タスク</label>
            <input type="textarea" class="form-control" id="content"  name="content" placeholder="やりたいこと追加" size=60>
          </div>
          <div class="form-group col-sm-1">
            <label for="inputName" class=""></label>
            <input type="button" value="Speak" class="form-control btn-secondary mt-2" onclick="rec.start()">
          </div>
          <div class="form-group col-sm-２">
            <label for="inputName" class="">必要ポイント</label>
            <input type="number" class="form-control" id="point"  name="point" placeholder=""　min="0">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-sm-12">
            <button type="submit" class="btn btn-success btn-block">追加</button>
          </div>
        </div>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">タスク</th>
          <th scope="col">必要ポイント</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      <?php $i=0; ?>
      @foreach ($wants as $want)
      <?php $i++; ?>
        <tr>
          <th scope="row"><?php echo $i ?></th>
            <td scope="col">{{$want->content}}</td>
            <td scope="col">{{$want->point}}</td>
            <td>
              <form action="/delete/{{ $want->id }}/want" method="GET">
              {{ csrf_field() }}
                <input type="submit" class="btn btn-success" value="購入">
              </form>
            </td>
        </tr>
      @endforeach
      </tbody>
   </table>
  </div>
@endsection