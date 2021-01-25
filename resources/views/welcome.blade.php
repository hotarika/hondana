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
                    <a class="p-welcome__registrationBtn -top" href="{{asset('/register')}}">会員登録（無料）</a>
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
                        <h3 class="p-welcome__featureHead"><i class="fas fa-bookmark"></i>自分だけの読書評価</h3>
                        <div class="p-welcome__featureText">
                            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </div>
                    </div>
                    <div class="p-welcome__featureWrap">
                        <h3 class="p-welcome__featureHead"><i class="fas fa-bookmark"></i>読書ライフを支援</h3>
                        <div class="p-welcome__featureText">
                            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </div>
                    </div>
                    <div class="p-welcome__featureWrap">
                        <h3 class="p-welcome__featureHead"><i class="fas fa-bookmark"></i>気軽にメモをしよう</h3>
                        <div class="p-welcome__featureText">
                            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- bottom --}}
        <section class="p-welcome__btnSection container">
            <a class="p-welcome__registrationBtn -bottom" href="{{asset('/register')}}">会員登録（無料）</a>
        </section>
    </div>
</main>
@endsection
