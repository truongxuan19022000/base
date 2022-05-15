@extends('admin.main')
@section('contents')
    <div class="contentWrap scrollbar">
        <div class="boxMain">
            <div class="headMain">
                <div class="headMain-info">
                    <h2 class="title">商品一覧</h2>
                    <div class="statistical">
                        <ul>
                            <li class="active">すべて<span class="f-roboto">(60)</span></li>
                            <li>承認待ち<span class="f-roboto">(20)</span></li>
                            <li>承認済み<span class="f-roboto">(40)</span></li>
                        </ul>
                    </div>
                </div>
                <div class="headMain-search">
                    <div class="search">
                        <button class="btn"><img src="{{asset('/assets/admin/images/common/icon-search.svg')}}" alt=""></button>
                        <input class="form-control" type="text" placeholder="キーワード">
                    </div>
                    <a class="conditions" href="#">詳細条件</a>
                </div>

            </div>
            <!--/.sectionMain-->

            <div class="paging">
                <div class="paging-number">
                    件数：<span class="number f-roboto">60</span>
                </div>
                <div class="pagination">
                    <ul>
                        <li class="disabled previous"><a href="#"><img class="svg"
                                                                       src="{{asset('/assets/admin/images/common/icon-arrow-pagin.svg')}}"
                                                                       alt=""></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="next"><a href="#"><img class="svg" src="{{asset('/assets/admin/images/common/icon-arrow-pagin.svg')}}"
                                                          alt=""></a></li>
                    </ul>
                </div>
            </div>
            <!--/.paging-->
        </div>
    </div>

    <!--/.contentWrap-->
@endsection