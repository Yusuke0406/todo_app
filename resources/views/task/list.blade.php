@extends('layouts.app')

@section('content')
  <h1 class="text-center h1">TASKS</h1>
    <div id="content">
      <input type="textarea" id="q" name="q" size=60>
      <input type="button" value="Click to Speak" onclick="rec.start()">
      <div id="recognizedText"></div>
    </div>
@endsection