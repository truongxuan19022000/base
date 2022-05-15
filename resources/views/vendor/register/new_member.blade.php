@extends('vendor.registerLayout')
@section('contents')
    <div class="wrapContent">
        <form method="POST" action="{{ route('register.authentication') }}">
            @csrf
            <div class="registerHead">
                <h1 class="registerHead-title">{{trans('vendor/register.header.title')}}</h1>
                <p class="registerHead-text">{{trans('vendor/register.header.text')}}</p>
                <p class="registerHead-text">ご入力いただいたメールアドレスに会員登録用のURLを送信します。</p>
            </div>
            <div class="registerForm">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table class="tableBox">
                    <tbody>
                    <tr>
                        <th>{{trans('vendor/register.form.email')}} </th>
                        <td><input class="form-control" type="email" placeholder="メールアドレスを入力" id="email" name="email">
                        </td>
                    </tr>
                    <tr>
                        <th>{{trans('vendor/register.form.password')}}パスワード</th>
                        <td><input class="form-control" type="password" placeholder="パスワードを入力" id="pwd" name="password">
                        </td>
                    </tr>
                    <tr>
                        <th>{{trans('vendor/register.form.password_confirmation')}}</th>
                        <td><input class="form-control" type="password" placeholder="パスワードを再度入力"
                                   id="password_confirmation" name="password_confirmation"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="terms">
                <h2 class="terms-title">{{trans('vendor/register.content.terms-title')}}</h2>
                <div class="terms-content">
                    <p class="terms-p">{{trans('vendor/register.content.terms-p')}}
                        この利用規約（以下、「本規約」といいます。）は、＿＿＿＿＿　（以下、「当社」といいます。）がこのウェブ上で提供するサービス（以下、「本サービス」といいます。）の利用条件を定めるものです。登録ユーザーの皆さま（以下、「ユーザー」といいます。）には、本規約に従って、本サービスをご利用いただきます。</p>
                    <p class="terms-p pt-4">{{trans('vendor/register.content.pt-4')}}<br>
                        本規約は、ユーザーと当社との間の本サービスの利用に関わる一切の関係に適用されるものとします。<br>
                        当社は本サービスに関し、本規約のほか、ご利用にあたってのルール等、各種の定め（以下、「個別規定」といいます。）をすることがあります。これら個別規定はその名称のいかんに関わらず、本規約の一部を構成するとします。
                    </p>
                </div>
            </div>
            <div class="btn-email text-center">
                <button type="submit" class="btn btn-primary btn-lg">{{trans('vendor/register.form.submit')}}

                </button>
            </div>
        </form>

    </div>
@endsection
