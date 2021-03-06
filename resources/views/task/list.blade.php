@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center h1">TASKS</h1>
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
    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
      <div class="flash_message bg-info text-center my-0 text-white">
        {{ session('flash_message') }}
      </div>
    @endif
    <form action="/task/{{ $cat_id }}/store" method="POST">
    {{ csrf_field() }}
      <div class="form-row">
        <div class="form-group col-sm-8">
          <label for="inputName" class="">タスク</label>
          <input type="textarea" class="form-control" id="content"  name="content">
        </div>
        <div class="form-group col-sm-1 mt-2">
          <label for="inputName" class=""></label>
          <input type="button" value="Speak" class="form-control btn-secondary" onclick="rec3.start()">
        </div>
        <div class="form-group col-sm-3">
          <label for="inputLimit" class="">期限</label>
          <input type="date" class="form-control" id="inputLimit" placeholder="" name="due_date">
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
          <th scope="col">期限</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
      @foreach ($tasks as $task)
        <?php $i++; ?>
        <tr>
          <th scope="row"><?php echo $i ?></th>
            <td scope="col">{{$task->content}}</td>
            <td scope="col">{{$task->due_date->format('Y/m/d')}}</td>
            <td>
              <form action="/task/{{ $task->id }}/complete" method="POST">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-success" value="完了">
              </form>
            </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection