@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body text-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                               <p>{{$user->name}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 text-md-right">{{ __('所持ポイント') }}</label>
                            <div class="col-md-6">
                                <p>{{$user->point}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 text-md-right">{{ __('累計ポイント') }}</label>
                            <div class="col-md-6">
                                <p>{{$count}}</p>
                            </div>
                        </div>
                        <a class="btn btn-primary text-white pr-4 pl-4" href="/user/{{$user->id}}/edit">編集</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection