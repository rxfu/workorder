<div class="col-sm-4">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">编辑用户{{ $user->username }}</div>
        </div>

        <form role="form" id="edit-form" name="edit-form" method="POST" action="{{ url('/user/' . $user->id) }}"
            aria-label="编辑用户" class="form-horizontal">
            @csrf
            @method('put')
            
            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-sm-4 control-label">用户名</label>
                    <div class="col-md-8">
                        <input id="username" type="text" class="form-control" name="username" placeholder="用户名" value="{{ $user->username }}"
                            required autofocus>
                        @if ($errors->has('username'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('realname') ? ' has-error' : '' }}">
                    <label for="realname" class="col-sm-4 control-label">真实姓名</label>
                    <div class="col-md-8">
                        <input id="realname" type="text" class="form-control" name="realname" placeholder="真实姓名" value="{{ $user->realname }}"
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
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
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
                    <button type="submit" class="btn btn-info">
                        <i class="icon fa fa-save"></i> 修改
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
