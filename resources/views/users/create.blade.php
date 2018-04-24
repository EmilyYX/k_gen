@extends('layouts.default')
@section('title', '新規登録')

@section('content')
<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>新規登録</h5>
        </div>
        <div class="panel-body">
            @include('shared._errors')
            <form method="POST" action="{{ route('users.store') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">名前：</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス：</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">パスワード：</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">もう一度パスワードを入力してください：</label>
                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                </div>

                <button type="submit" class="btn btn-primary">アカウント作成</button>
            </form>
        </div>
    </div>
</div>
@stop
