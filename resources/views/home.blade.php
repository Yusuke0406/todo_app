@extends('layouts.app')

@section('content')
<div class="container">
	<h1 class="text-center h1"></h1>
		<!-- フラッシュメッセージ -->
			@if (session('flash_message'))
				<div class="flash_message bg-info text-center text-white mb-2">
					{{ session('flash_message') }}
				</div>
			@endif
	<div class="card mx-auto" style="width: 400px;">
	@if($count < 10)
		<img src="image/boy.png" width="100%" height="250px">
	@elseif(10 <= $count && $count < 20)
		<img src="image/otowa.JPG" width="100%" height="250px">
	@elseif(20 <= $count && $count < 30)
		<img src="image/junior.jpg" width="100%" height="250px">
	@elseif(30 <= $count && $count < 40)
		<img src="image/high.jpg" width="100%" height="250px">
	@elseif(40 <= $count && $count < 50)
		<img src="image/college.jpg" width="100%" height="250px">
	@elseif(50 <= $count && $count < 60)
		<img src="image/ganba.jpg" width="100%" height="250px">
	@elseif(60 <= $count && $count < 70)
		<img src="image/mig.jpeg" width="100%" height="250px">
	@elseif(70 <= $count && $count < 80)
		<img src="image/yellow.jpg" width="100%" height="250px">
	@elseif(80 <= $count )
		<img src="image/Liverpool_logo.png" width="100%" height="250px">
	@endif

		<div class="card-body">
			<h5 class="card-title"> {{ Auth::user()->name }}</h5>
			<p class="card-text">{{$club->club}}</p>
			<p class="card-text">累計タスク完了数：{{ $count }}回</p>
			<p class="card-text">移籍まであと：{{ $rest }}回</p>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col col-edit col-6 py-5 px-lg-5 bg-primary border rounded text-white text-center align-middle">
			<a href="{{ action('WantController@index')}}" class="text-white">やりたいこと</a>
		</div>
		<div class="col col-edit col-6 py-5 px-lg-5 bg-primary border rounded text-white text-center align-middle">
			<a href="{{ action('CategoryController@index')}}" class="text-white">やること</a>
		</div>
	</div>
</div>
@endsection
