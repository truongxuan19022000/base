@extends('vendor.main')
@section('vendor.user')
<div class="titleMain">
    <div class="titleHead">
        <h1 class="title"><span class="item"><img src="{{URL::asset('assets/vendor/images/common/icon-title-pro.svg')}}"
                                                  alt=""></span>商品管理</h1>
        <button type="button" class="btn btn-primary btn-lg">商品を新規作成する</button>
    </div>
    <p class="titleNote">お客様にお問い合わせいただいた商品と、今後の流れを記載しています。</p>
</div>
@include('vendor.layout.list')
@endsection
