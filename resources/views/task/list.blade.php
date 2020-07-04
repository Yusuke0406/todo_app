@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center h1">TASKS</h1>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    <form action="/task/store" method="POST">
    {{ csrf_field() }}
        <div class="form-row">
          <div class="form-group col-sm-8">
            <label for="inputName" class="">タスク</label>
              <input type="textarea" class="form-control" id="content"  name="content" placeholder="" size=60>
            </div>
          <div class="form-group col-sm-1 mt-2">
            <label for="inputName" class=""></label>
            <input type="button" value="Speak" class="form-control btn-secondary" onclick="rec.start()">
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
          <td><input name="agree" type="checkbox" value="1" ></td>
        </tr>
      @endforeach
      </tbody>
   </table>
  </div>
@endsection