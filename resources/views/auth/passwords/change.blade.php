@extends('layouts.page')

@section('title', '修改密码')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">修改密码</h3>
            </div>

            <form role="form" method="POST" action="{{ url('/password/change') }}" aria-label="修改密码" class="form-horizontal">
                @csrf
                @method('put')

                <div class="box-body">
                    <div class="form-group has-feedback{{ $errors->has('old_password') ? ' has-error' : '' }}">
                        <label for="old_password" class="col-sm-2 control-label">旧密码</label>
                        <div class="col-md-10">
                            <input id="old_password" type="password" class="form-control" name="old_password" placeholder="旧密码" required>
                            @if ($errors->has('old_password'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-2 control-label">新密码</label>

                        <div class="col-md-10">
                            <input id="password" type="password" class="form-control" name="password" placeholder="新密码" required>
                            <p class="help-block">请输入至少6个字符</p>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation" class="col-sm-2 control-label">确认密码</label>

                        <div class="col-md-10">
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="确认密码" required>
                            <p class="help-block">与新密码一致</p>
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">确认修改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
