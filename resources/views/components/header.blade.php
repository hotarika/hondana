<header class="l-header">
    <div class="container">
        <div class="p-header">
            {{-- logo --}}
            <div class="p-header__logoWrap">
                <a @guest href="/"
                    @else href="{{route('bookshelf.index')}}"
                    @endguest>
                    <img class="p-header__logoIcon" src="{{asset('icon/logo/logoIcon.svg')}}" alt="ロゴアイコン">
                    <img class="p-header__logo" src="{{asset('icon/logo/logo.svg')}}"
                        alt="ロゴ">
                </a>
            </div>

            @guest {{-- ゲストユーザーの場合 --}}

            <nav class="p-header__nav -guest">
                <ul class="p-header__navLists -guest">
                    <li class="p-header__navList -guest">
                        <a href="{{route('login')}}">ログイン</a>
                    </li>
                    <li class="p-header__navList -guest">
                        <a href="{{route('register')}}">会員登録</a>
                    </li>
                </ul>
            </nav>

            @else {{-- ログインユーザーの場合 --}}

            {{-- navigation --}}
            <nav class="p-header__nav -user js-nav">
                <i class="far fa-times-circle p-header__menuClose js-closeIcon"></i>
                <ul class="p-header__navLists">
                    <li class="p-header__navList -myShelf">
                        <a href="{{route('bookshelf.index')}}"><i
                                class="fas fa-smile"></i><span
                                class="p-header__username">{{Auth::user()->name}}</span>の本棚</a>
                    </li>
                    <li class="p-header__navList -bookRegister">
                        <a href="{{route('books-graph')}}"><i class="fas fa-chart-bar"></i>読書グラフ</a>
                    </li>
                    <li class="p-header__navList -bookRegister">
                        <a href="{{route('bookshelf.create')}}"><i class="fas fa-book"></i>本棚に登録</a>
                    </li>
                    <li class="p-header__navList -settings">
                        <a href="{{route('edit.form')}}"><i class="fas fa-cog"></i>設定</a>
                    </li>
                    <li class="p-header__navList -logout">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="fas fa-sign-out-alt"></i>ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <img class="p-header__menuOpen js-openIcon" src="{{asset('icon/bars-solid.svg')}}"
                alt="ハンバーガーメニュー" />
            @endguest

        </div>
    </div>
</header>
