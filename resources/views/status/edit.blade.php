<div class="col-sm-4">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">编辑状态{{ $status->name }}</div>
        </div>

        <form role="form" id="edit-form" name="edit-form" method="POST" action="{{ url('/status/' . $status->id) }}"
            aria-label="编辑状态" class="form-horizontal">
            @csrf
            @method('put')
            
            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-4 control-label">状态名称</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" placeholder="状态名称" value="{{ $status->name }}"
                            required autofocus>
                        @if ($errors->has('name'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('is_enable') ? ' has-error' : '' }}">
                    <label for="is_enable" class="col-sm-4 control-label">是否启用</label>
                    <div class="col-md-8">
                        <lable class="radio-inline">
                            <input id="is_enable" type="radio" name="is_enable" value="1"{{ $status->is_enable == true ? ' checked' : '' }}> 是
                        </lable>
                        <label class="radio-inline">
                            <input id="is_enable" type="radio" name="is_enable" value="0"{{ $status->is_enable == false ? ' checked' : '' }}> 否
                        </label>
                        @if ($errors->has('is_enable'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('is_enable') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('is_displayed') ? ' has-error' : '' }}">
                    <label for="is_displayed" class="col-sm-4 control-label">是否显示</label>
                    <div class="col-md-8">
                        <lable class="radio-inline">
                            <input id="is_displayed" type="radio" name="is_displayed" value="1"{{ $status->is_displayed == true ? ' checked' : '' }}> 是
                        </lable>
                        <label class="radio-inline">
                            <input id="is_displayed" type="radio" name="is_displayed" value="0"{{ $status->is_displayed == false ? ' checked' : '' }}> 否
                        </label>
                        @if ($errors->has('is_displayed'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('is_displayed') }}</strong>
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
