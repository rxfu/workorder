<div class="col-sm-4">
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="box-title">创建状态</div>
        </div>

        <form role="form" id="create-form" name="create-form" method="POST" action="{{ url('/status') }}"
            aria-label="创建状态" class="form-horizontal">
            @csrf

            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-4 control-label">状态名称</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" placeholder="状态名称" value="{{ old('name') }}"
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
                            <input id="is_enable" type="radio" name="is_enable" value="1" checked> 是
                        </lable>
                        <label class="radio-inline">
                            <input id="is_enable" type="radio" name="is_enable" value="0"> 否
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
                            <input id="is_displayed" type="radio" name="is_displayed" value="1" checked> 是
                        </lable>
                        <label class="radio-inline">
                            <input id="is_displayed" type="radio" name="is_displayed" value="0"> 否
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
                    <button type="submit" class="btn btn-success">
                        <i class="icon fa fa-plus"></i> 创建
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
