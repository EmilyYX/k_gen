@extends('layouts.default')
@section('title', 'ログイン')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>ログイン</h5>
            </div>
            <div class="panel-body">
                @include('shared._errors')

                <form method="POST" action="{{route('login')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="email">メールアドレス：</label>
                        <input type="text" name="email" class="form-control" value="{{old('email')}}">
                    </div>

                    <div class="form-group">
                        <label for="password">パスワード：</label>
                        <input type="password" name="password" class="form-control" value="{{old('password')}}">
                    </div>


                    <div class="checkbox">
                        <label><input type="checkbox" name="remember">ログインしたままにする</label>
                    </div>

                    <button type="submit" class="btn btn-primary">ログイン</button>
                </form>

                <hr>

                <p>アカウントを持っていませんか<a href="{{ route('signup') }}">アカウントを作成</a></p>
            </div>
        </div>
    </div>
@stop
