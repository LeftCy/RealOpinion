<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/top') }}">
                <img src="{{ asset('images/icon.png') }}" alt="realOpinion">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" id="active-top">
                        <a class="nav-link" href="{{ url('/top') }}">トップ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item" id="active-service">
                        <a class="nav-link" href="{{ url('/about') }}">サービスについて</a>
                    </li>
                    <li class="nav-item" id="active-teach">
                        <a class="nav-link" href="{{ url('/teach') }}">教える、教わる</a>
                    </li>
                    <li class="nav-item dropdown" id="active-category">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            カテゴリ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('opinions') }}">全てのカテゴリ</a>
                            <a class="dropdown-item" href="{{ route('opinions', ['category' => 99]) }}">プログラミング言語</a>
                            <a class="dropdown-item" href="{{ route('opinions', ['category' => 88]) }}">転職・就職</a>
                            <a class="dropdown-item" href="{{ route('opinions', ['category' => 77]) }}">その他</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">お問い合わせ</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login')}}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register')}}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('mypage') }}" class="dropdown-item">マイページ</a>
                                <a class="dropdown-item" href="{{ route('coin.index') }}">コイン購入</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>