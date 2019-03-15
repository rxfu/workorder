@extends('layouts.app')

@section('title', '登录')

@section('body_class', 'login-page')

@section('body')
<div class="wrapper">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ config('app.name') }}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">请登录系统</p>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                    <input type="text" id="username" name="username" class="form-control" placeholder="用户名" value="{{ old('username') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" id="password" name="password" class="form-control" placeholder="密码">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> 记住我
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!--
            <a href="{{ route('password.request') }}">忘记密码</a><br>
            <a href="{{ route('register') }}" class="text-center">注册</a>
            -->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</div>
@stop

@push('styles')
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('vendor/iCheck/square/blue.css') }}">
@endpush

@push('scripts')
<!-- iCheck -->
<script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
<script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    });
});
</script>
@endpush
