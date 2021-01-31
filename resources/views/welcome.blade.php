@extends('layouts.app')
@section('title', 'ホーム')

@section('content')
<main class="l-main -welcome">
    <div class="p-welcome">
        {{-- top --}}
        <section class="p-welcome__catchSection">
            <div class="container">

                {{-- テキストエリア --}}
                <div class="p-welcome__catchTextWrap">
                    <h1 class="p-welcome__catchTitle">あなただけの本棚を作ってみませんか？</h1>
                    <div class="p-welcome__catchText">HONDANAは、"シンプル・簡単" に自分だけの読書記録を管理できるサービスです</div>
                    <div class="p-welcome__btnWrap">
                        <a class="p-welcome__registrationBtn c-formAuth__welcomeBtn"
                            href="{{asset('/register')}}">会員登録（無料）</a>
                        <form id="child-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="email" value="test@example.com" form="child-form">
                            <input type="hidden" name="password" value="password" form="child-form">
                            <button type="submit" class="btn btn-primary c-formAuth__welcomeBtn" form="child-form">
                                中を見てみる
                            </button>
                        </form>
                    </div>
                </div>
                {{-- アイコン --}}
                <div class="p-welcome__catchIconWrap">
                    <img class="p-welcome__catchIcon" src="{{asset('icon/reading-person.svg')}}" alt="">
                </div>

            </div>
        </section>

        {{-- middle --}}
        <section class="p-welcome__featuresSection">
            <div class="container">
                <h2 class="p-welcome__featuresSectionHead">
                    <img class="p-welcome__featuresSectionHeadLogoIcon"
                        src="{{asset('icon/logo/logoIcon.svg')}}" alt="ロゴアイコン">
                    <img class="p-welcome__featuresSectionHeadLogo" src="{{asset('icon/logo/logo.svg')}}"
                        alt="ロゴ">
                    <div>の特徴</div>
                </h2>
                <div class="p-welcome__featuresWrap">

                    <div class="p-welcome__featureWrap">
                        <h3 class="p-welcome__featureHead"><i class="fas fa-bookmark"></i>プライベートな空間の確保</h3>
                        <div class="p-welcome__featureText">
                            HONDANAでは、他のユーザーの読書評価を意識することなく読書管理をできるのが特徴です。なぜなら「読書の評価は自分がするもの」だからです。<br>書籍の受け取り方・評価は、その人の環境・年齢・考え方によって、大きく異なるため、それぞれ他者の読書評価を意識させないよう、個々の読書空間を保っています。
                        </div>
                    </div>
                    <div class="p-welcome__featureWrap">
                        <h3 class="p-welcome__featureHead"><i class="fas fa-bookmark"></i>読書ライフを支援</h3>
                        <div class="p-welcome__featureText">
                            読書記録を管理する上で壁となる原因の１つに、「管理方法がわからず続かない」というものがあります。ノートに綺麗にまとめるには、下準備で時間を取られてしまうことでしょう。<br>HONDANAでは、「書籍を検索→読書メモを追加」の簡単なステップだけで、綺麗に素早く簡単に読書記録を残すことができます。また、グラフで読書数の管理もできます。
                        </div>
                    </div>
                    <div class="p-welcome__featureWrap">
                        <h3 class="p-welcome__featureHead"><i class="fas fa-bookmark"></i>直感的な使いやすさ</h3>
                        <div class="p-welcome__featureText">
                            私たちは「とにかく読書を楽しんでいただくこと」を重視してこのアプリを設計しています。読書に集中していただくため、無駄な機能を全てなくし、直感的に使えることを意識して設計しました。<br>今までメモや管理にかけていた時間を読書の時間にあてることで、もっと素敵な時間を過ごしてみませんか？
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- bottom --}}
        <section class="p-welcome__btnSection container">
            <a class="p-welcome__registrationBtn -bottom c-formAuth__welcomeBtn"
                href="{{asset('/register')}}">会員登録（無料）</a>
        </section>
    </div>
</main>
@endsection
