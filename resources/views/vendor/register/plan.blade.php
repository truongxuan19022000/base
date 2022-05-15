@extends('vendor.registerLayout')
@section('contents')
<div class="wrapContent">
    <div class="registerHead">
        <p class="registerHead-step f-roboto">STEP <span>1</span>/5</p>
        <h1 class="registerHead-title">ご登録プランの選択</h1>
        <p class="registerHead-text">ご登録するプランを選択してください。</p>
    </div>
    <div class="planInfo">
        <ul>
            <li>
                <span class="item"><img src="{{asset('assets/vendor/images/common/icon-check-plan.svg')}}"></span>
                <div class="planInfo-head">
                    <h2 class="tlt">無料プラン</h2>
                    <div class="monthly">
                        <span class="monthly-tlt">月額料金</span>
                        <span class="monthly-number f-roboto">0</span>
                        <span class="monthly-yen">円（年間0円）</span>
                    </div>
                </div>
                <div class="planInfo-flex">
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">着手金・成果報酬</h3>
                        <ul class="planNav planNav-col2">
                            <li>・持続化補助金
                                <ul class="planNav-sub">
                                    <li>着手金5万円（1pt）</li>
                                    <li>成果報酬10万円</li>
                                </ul>
                            </li>
                            <li>・ものづくり補助金
                                <ul class="planNav-sub">
                                    <li>着手金20万円（4pt）</li>
                                    <li>成果報酬10％(着手金含)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">サービス内容</h3>
                        <ul class="planNav">
                            <li>・営業ツールやフライヤー等の作成</li>
                            <li>・HPやLPの作成</li>
                            <li>・ポータルサイトへの掲載　etc</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="active">
                <span class="item"><img src="{{asset('assets/vendor/images/common/icon-check-plan.svg')}}"></span>
                <div class="planInfo-head">
                    <h2 class="tlt">シルバー</h2>
                    <div class="monthly">
                        <span class="monthly-tlt">月額料金</span>
                        <span class="monthly-number f-roboto">30,000</span>
                        <span class="monthly-yen">円（年間360,000円）</span>
                    </div>
                </div>
                <div class="planInfo-flex">
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">着手金・成果報酬</h3>
                        <ul class="planNav planNav-col2">
                            <li>・持続化補助金
                                <ul class="planNav-sub">
                                    <li>着手金5万円（1pt）</li>
                                    <li>成果報酬10万円</li>
                                </ul>
                            </li>
                            <li>・ものづくり補助金
                                <ul class="planNav-sub">
                                    <li>着手金20万円（4pt）</li>
                                    <li>成果報酬10％(着手金含)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">サービス内容</h3>
                        <ul class="planNav">
                            <li>・営業ツールやフライヤー等の作成</li>
                            <li>・HPやLPの作成</li>
                            <li>・ポータルサイトへの掲載　etc</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <span class="item"><img src="{{asset('assets/vendor/images/common/icon-check-plan.svg')}}"></span>
                <div class="planInfo-head">
                    <h2 class="tlt">ゴールド</h2>
                    <div class="monthly">
                        <span class="monthly-tlt">月額料金</span>
                        <span class="monthly-number f-roboto">50,000</span>
                        <span class="monthly-yen">円（年間600,000円）</span>
                    </div>
                </div>
                <div class="planInfo-flex">
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">着手金・成果報酬</h3>
                        <ul class="planNav planNav-col2">
                            <li>・持続化補助金
                                <ul class="planNav-sub">
                                    <li>着手金5万円（1pt）</li>
                                    <li>成果報酬10万円</li>
                                </ul>
                            </li>
                            <li>・ものづくり補助金
                                <ul class="planNav-sub">
                                    <li>着手金20万円（4pt）</li>
                                    <li>成果報酬10％(着手金含)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">サービス内容</h3>
                        <ul class="planNav">
                            <li>・営業ツールやフライヤー等の作成</li>
                            <li>・HPやLPの作成</li>
                            <li>・ポータルサイトへの掲載　etc</li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <span class="item"><img src="{{asset('assets/vendor/images/common/icon-check-plan.svg')}}"></span>
                <div class="planInfo-head">
                    <h2 class="tlt">プラチナ</h2>
                    <div class="monthly">
                        <span class="monthly-tlt">月額料金</span>
                        <span class="monthly-number f-roboto">100,000</span>
                        <span class="monthly-yen">円（年間1,200,000円）</span>
                    </div>
                </div>
                <div class="planInfo-flex">
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">着手金・成果報酬</h3>
                        <ul class="planNav planNav-col2">
                            <li>・持続化補助金
                                <ul class="planNav-sub">
                                    <li>着手金5万円（1pt）</li>
                                    <li>成果報酬10万円</li>
                                </ul>
                            </li>
                            <li>・ものづくり補助金
                                <ul class="planNav-sub">
                                    <li>着手金20万円（4pt）</li>
                                    <li>成果報酬10％(着手金含)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="planInfo-col">
                        <h3 class="planInfo-tlt">サービス内容</h3>
                        <ul class="planNav">
                            <li>・営業ツールやフライヤー等の作成</li>
                            <li>・HPやLPの作成</li>
                            <li>・ポータルサイトへの掲載　etc</li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="btn-wrap">
        <button type="button" class="btn btn-outline-dark btn-lg btn-fs15">戻る</button>
        <button type="button" class="btn btn-primary btn-lg">お支払い情報の入力へ</button>
    </div>
</div>
@endsection
