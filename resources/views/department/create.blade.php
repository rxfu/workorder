<div class="col-sm-4">
    <div class="box box-success">
        <div class="box-header with-border">
            <div class="box-title">创建部门</div>
        </div>

        <form role="form" id="create-form" name="create-form" method="POST" action="{{ url('/department') }}"
            aria-label="创建部门" class="form-horizontal">
            @csrf

            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-4 control-label">部门名称</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" placeholder="部门名称" value="{{ old('name') }}"
                            required autofocus>
                        @if ($errors->has('name'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
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
