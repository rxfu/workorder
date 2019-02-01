<div class="col-sm-4">
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="box-title">创建用户</div>
        </div>

        <form role="form" id="create-form" name="create-form" method="POST" action="{{ url('/user') }}"
            aria-label="创建用户" class="form-horizontal">
            @csrf

            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-sm-4 control-label">用户名</label>
                    <div class="col-md-8">
                        <input id="username" type="text" class="form-control" name="username" placeholder="用户名" value="{{ old('username') }}"
                            required autofocus>
                        @if ($errors->has('username'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">密码</label>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control" name="password" placeholder="密码"
                            required>
                        <p class="help-block">请输入至少6个字符</p>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('realname') ? ' has-error' : '' }}">
                    <label for="realname" class="col-sm-4 control-label">真实姓名</label>
                    <div class="col-md-8">
                        <input id="realname" type="text" class="form-control" name="realname" placeholder="真实姓名" value="{{ old('realname') }}"
                            required>
                        @if ($errors->has('realname'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('realname') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">
                        <i class="icon fa fa-plus"></i> 创建
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
