@extends('admin.main')
@section('contents')

    <div class="wrapper">
        <div class="content">
            <div class="contentWrap scrollbar contentWrap--user">
                <div class="boxMain">
                    <div class="headMain">
                        <div class="headMain-info">
                            <h2 class="title">{{trans('admin/user.title') }}</h2>
                            <div class="statistical">
                                <ul>
                                    <li class="active">すべて<span class="f-roboto">(60)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="headMain-search">
                            <form method="get" name="adminFormSearch" class="adminFormSearch d-flex">
                                <div class="search">
                                    <button class="btn"><img
                                            src="{{asset('/assets/admin/images/common/icon-search.svg')}}" alt="">
                                    </button>
                                    <input name="filter" class="form-control" type="text" placeholder="キーワード">
                                </div>
                                <a class="conditions" href="#">{{trans('admin/user.condition_search')}}</a>
                            </form>
                        </div>
                    </div><!--/.headMain-->
                    <div class="sectionMain">
                        <div class="tablefixedhead scrollbar tblUser">
                            <form name="adminForm" method="post">
                                @csrf
                                @method('POST')
                                <table>
                                    <thead>
                                    <tr>
                                        <th>{{trans('admin/user.company') }}</th>
                                        <th>{{trans('admin/user.person_in_charge') }}</th>
                                        <th>{{trans('admin/user.member_employee') }}</th>
                                        <th>{{trans('admin/user.postal_code') }}</th>
                                        <th>{{trans('admin/user.address') }}</th>
                                        <th>{{trans('admin/user.phone') }}</th>
                                        <th>{{trans('admin/user.number_of_product') }}</th>
                                        <th>{{trans('admin/user.application_date_time') }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            @if($user->userInfo)
                                                <td>{{$user->userInfo->company_name}}</td>
                                            @endif
                                            @if(!$user->userInfo)
                                                <td></td>
                                            @endif
                                            @if($user->userInfo)
                                                <td>{{$user->userInfo->surname_kana .' '. $user->userInfo->name_kana}}</td>
                                            @endif
                                            @if(!$user->userInfo)
                                                <td></td>
                                            @endif
                                            @if($user->userInfo)
                                                <td>{{$user->userInfo->member_employee}}</td>
                                            @endif
                                            @if(!$user->userInfo)
                                                <td></td>
                                            @endif
                                            @if($user->userInfo)
                                                <td>{{$user->userInfo->postal_code}}</td>
                                            @endif
                                            @if(!$user->userInfo)
                                                <td></td>
                                            @endif
                                            @if($user->userInfo)
                                                <td>{{$user->userInfo->address}}</td>
                                            @endif
                                            @if(!$user->userInfo)
                                                <td></td>
                                            @endif
                                            @if($user->userInfo)
                                                <td>{{$user->userInfo->phone}}</td>
                                            @endif
                                            @if(!$user->userInfo)
                                                <td></td>
                                            @endif
                                            <td>{{$user->getApplications($user->applications)}}</td>
                                            <td>2020-11-20</td>
                                            <td class="row">
                                                <a href="{{ route('admin.users.edit',[$user->id]) }}"><i
                                                        style="color: green" class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div><!--/.sectionMain-->
                    {{$users->links()}}
                </div>
            </div><!--/.contentWrap-->
        </div><!--/.content-->
    </div>
@endsection
