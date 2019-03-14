<div class="col-sm-4">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">编辑IP地址{{ $ipaddress->ip }}</div>
        </div>

        <form role="form" id="edit-form" name="edit-form" method="POST" action="{{ url('/ip/' . $ipaddress->id) }}"
            aria-label="编辑IP地址" class="form-horizontal">
            @csrf
            @method('put')
            
            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type" class="col-sm-2 control-label">类别</label>
                    <div class="col-md-10">
                        <select name="type" id="type" class="form-control">
                            <option value="服务器"{{ $ipaddress->type === '服务器' ? ' selected' : '' }}>服务器</option>
                            <option value="个人电脑"{{ $ipaddress->type === '个人电脑' ? ' selected' : '' }}>个人电脑</option>
                            <option value="打印机"{{ $ipaddress->type === '打印机' ? ' selected' : '' }}>打印机</option>
                            <option value="其他"{{ $ipaddress->type === '其他' ? ' selected' : '' }}>其他</option>
                        </select>
                        @if ($errors->has('type'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('campus') ? ' has-error' : '' }}">
                    <label for="campus" class="col-sm-2 control-label">校区</label>
                    <div class="col-md-10">
                        <select name="campus" id="campus" class="form-control">
                                <option value="雁山"{{ $ipaddress->campus === '雁山' ? ' selected' : '' }}>雁山</option>
                                <option value="育才"{{ $ipaddress->campus === '育才' ? ' selected' : '' }}>育才</option>
                                <option value="王城"{{ $ipaddress->campus === '王城' ? ' selected' : '' }}>王城</option>
                        </select>
                        @if ($errors->has('campus'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('campus') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('floor') ? ' has-error' : '' }}">
                    <label for="floor" class="col-sm-2 control-label">楼层</label>
                    <div class="col-md-10">
                        <input id="floor" type="text" class="form-control" name="floor" placeholder="楼层"
                            value="{{ $ipaddress->floor }}">
                        @if ($errors->has('floor'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('floor') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('room') ? ' has-error' : '' }}">
                    <label for="room" class="col-sm-2 control-label">房间</label>
                    <div class="col-md-10">
                        <input id="room" type="text" class="form-control" name="room" placeholder="房间"
                            value="{{ $ipaddress->room }}">
                        @if ($errors->has('room'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('room') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('ip') ? ' has-error' : '' }}">
                    <label for="ip" class="col-sm-2 control-label">IP地址</label>
                    <div class="col-md-10">
                        <input id="ip" type="text" class="form-control" name="ip" placeholder="IP地址"
                            value="{{ $ipaddress->ip }}">
                        @if ($errors->has('ip'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('ip') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('mac') ? ' has-error' : '' }}">
                    <label for="mac" class="col-sm-2 control-label">MAC地址</label>
                    <div class="col-md-10">
                        <input id="mac" type="text" class="form-control" name="mac" placeholder="MAC地址"
                            value="{{ $ipaddress->mac }}">
                        @if ($errors->has('mac'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('mac') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('usage') ? ' has-error' : '' }}">
                    <label for="usage" class="col-sm-2 control-label">用途</label>
                    <div class="col-md-10">
                        <input id="usage" type="text" class="form-control" name="usage" placeholder="用途"
                            value="{{ $ipaddress->usage }}">
                        @if ($errors->has('usage'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('usage') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('machine') ? ' has-error' : '' }}">
                    <label for="machine" class="col-sm-2 control-label">机器名</label>
                    <div class="col-md-10">
                        <input id="machine" type="text" class="form-control" name="machine" placeholder="机器名" value="{{ $ipaddress->machine }}">
                        @if ($errors->has('machine'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('machine') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-sm-2 control-label">用户名</label>
                    <div class="col-md-10">
                        <input id="username" type="text" class="form-control" name="username" placeholder="用户名" value="{{ $ipaddress->username }}">
                        @if ($errors->has('username'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-2 control-label">密码</label>
                    <div class="col-md-10">
                        <input id="password" type="text" class="form-control" name="password" placeholder="密码" value="{{ $ipaddress->password }}">
                        @if ($errors->has('password'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('memo') ? ' has-error' : '' }}">
                    <label for="memo" class="col-sm-2 control-label">备注</label>
                    <div class="col-md-10">
                        <textarea name="memo" id="memo" class="form-control" cols="30" rows="10">{{ $ipaddress->memo }}</textarea>
                        @if ($errors->has('memo'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('memo') }}</strong>
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
