<header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            <a href="{{route('home')}}" id="logo">k_gen- Laravelで構築SNS</a>
            <nav>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li><a href="{{route('users.index')}}">ユーザリスト</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{Auth::user()->name}}<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('users.show', Auth::user()->id)}}">プロフィール</a></li>
                            <li><a href="{{route('users.edit', Auth::user()->id)}}">プロフィールを編集</a></li>
                            <li>
                                <a id="logout" href="#">
                                    <form action="{{route('logout')}}" method="POST">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-block btn-danger" type="submit" name="button">ログアウト</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li><a href="{{ route('help') }}">ヘルプ</a></li>
                    <li><a href="{{route('login')}}">ログイン</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
