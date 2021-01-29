<aside class="col-md-3 col-lg-2 px-md-0 p-settings">
    <div class="p-settings__listsParent js-settings-click">
        <div>設定メニュー</div>
        <div>▼</div>
    </div>
    <ul class="p-settings__lists px-0">
        <a id="" class="p-settings__link js-settings-item" href="{{route('edit.form')}}">
            <li
                class="p-settings__list -changePass js-settings-item @if(Request::is('edit/profile')) current-page @endif">
                会員情報変更
            </li>
        </a>
        <a id="" class="p-settings__link js-settings-item"
            href="{{route('password.form')}}">
            <li
                class="p-settings__list -changePass js-settings-item @if(Request::is('password/change')) current-page @endif">
                パスワード変更
            </li>
        </a>
        <a class="p-settings__link js-settings-item" href="{{route('bookshelf.index')}}">
            <form action="{{route('withdraw',Auth::id())}}" method="post" type="submit">
                @method('DELETE')
                @csrf

                <button class="p-settings__list -withdrawal js-settings-item"
                    onclick="return confirm('退会したアカウントは復元することができません。\n本当に削除してもよろしいですか？')">退会</button>
            </form>
        </a>
    </ul>
</aside>
