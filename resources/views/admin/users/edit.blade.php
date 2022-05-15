@extends('admin.main')
@section('contents')
{{--    @dd($item->userInfo)--}}
    <div class="row">
        <div class="contentMain">
            <form class="check-form-change" name="adminForm" method="post" action="{{ route('admin.users.update' ,$item->id) }}">
                @csrf
                @method('PUT')
                <input class="form-control d-none" value="{{$item->id}}" name="id"  type="text">
                <div class="headeBack">
                    <div class="wrap">
                        <div class="headeFlex">
                            <div class="headeBack-lf d-flex">
                                <a class="btn" href="{{ route('admin.users.index') }}">
                                    <img src="{{asset('/assets/admin/images/common/icon-arrow-back01.svg')}}">
                                </a>
                                <h1 class="title">ユーザーを新規追加</h1>
                            </div>
                            <div class="headeBack-btn">
                                <button class="btn btn-primary btn-md">保存する</button>
                            </div>
                        </div>
                    </div>
                </div><!--/.headeBack-->
                <div class="groupMain scrollbar">
                    <div class="wrap">
                        <div class="wrap-w800">
                            <div class="formRow">
                                <div class="formRow-col">
                                    <div class="formGroup">
                                        <p class="formGroup-tlt">会社情報</p>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.company') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <input class="form-control" value="{{$item->userInfo ? $item->userInfo->company_name : null}}" name="company_name"  type="text" placeholder="例）株式会社ABC">
                                                @error('company_name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror<br><br>
                                            </div>
                                        </div>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.member_employee') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <input class="form-control" type="text" value="{{$item->userInfo->member_employee}}" name="member_employee" placeholder="例）50">
                                                @error('member_employee')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror<br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formGroup">
                                        <p class="formGroup-tlt">連絡先</p>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.phone') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <input class="form-control" type="text" name="phone" value="{{$item->userInfo->phone}}" placeholder="例）0312345678">
                                                @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror<br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formGroup">
                                        <p class="formGroup-tlt">担当者</p>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">氏名<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <ul class="formGroup-ulCol2">
                                                    <li>
                                                        <div class="inputLabel">
                                                            <span class="spanLabel">{{trans('admin/user.surname_kana') }}</span>
                                                            <input class="form-control" value="{{$item->userInfo->surname_kana}}" name="surname_kana" placeholder="例）山田">
                                                            @error('surname_kana')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror<br><br>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="inputLabel">
                                                            <span class="spanLabel">{{trans('admin/user.name_kana') }}</span>
                                                            <input class="form-control" value="{{$item->userInfo->name_kana}}" name="name_kana" placeholder="例）太郎">
                                                            @error('name_kana')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror<br><br>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="inputLabel">
                                                            <span class="spanLabel">{{trans('admin/user.surname_kanji') }}</span>
                                                            <input value="{{$item->userInfo->surname_kanji}}" class="form-control" name="surname_kanji" placeholder="例）ヤマダ">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="inputLabel">
                                                            <span class="spanLabel">{{trans('admin/user.name_kanji') }}</span>
                                                            <input class="form-control" value="{{$item->userInfo->name_kanji}}" name="name_kanji" placeholder="例）タロウ">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.department') }}</label>
                                            <div class="formGroup-control">
                                                <input class="form-control" value="{{$item->userInfo->department}}" type="text" name="department" placeholder="例）マーケティング部 部長">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="formRow-col">
                                    <div class="formGroup">
                                        <p class="formGroup-tlt">住所</p>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.postal_code') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <div class="postalCode">
                                                    <input class="form-control" value="{{$item->userInfo->postal_code}}" type="text" name="postal_code" placeholder="例）1230000">
                                                    <span>〒</span>
                                                    @error('postal_code')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror<br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.province_name') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <input class="form-control" value="{{$item->userInfo->province_name}}" name="province_name" type="text" placeholder="東京都">
                                                @error('province_name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror<br><br>
                                            </div>
                                        </div>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.district_name') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <input class="form-control" value="{{$item->userInfo->district_name}}" name="district_name" type="text" placeholder="例）渋谷区渋谷１−２−３">
                                                @error('district_name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror<br><br>
                                            </div>
                                        </div>
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.address') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <input class="form-control" value="{{$item->userInfo->address}}" name="address" type="text" placeholder="例）ABCマンション１０２">
                                                @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror<br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formGroup">
                                        <div class="formGroup-input">
                                            <label class="formGroup-label">{{trans('admin/user.email') }}<span class="required"><img src="{{asset('/assets/admin/images/common/icon-required.svg')}}" alt=""></span></label>
                                            <div class="formGroup-control">
                                                <input class="form-control" value="{{$item->email}}" type="text" name="email" placeholder="例）sample@example.com">
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror<br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.groupMain-->
            </form>
        </div><!--/.contentMain-->
    </div>
@endsection
