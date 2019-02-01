<div class="col-sm-4">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">编辑部门{{ $department->name }}</div>
        </div>

        <form role="form" id="edit-form" name="edit-form" method="POST" action="{{ url('/department/' . $department->id) }}"
            aria-label="编辑部门" class="form-horizontal">
            @csrf
            @method('put')
            
            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-4 control-label">部门名称</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" placeholder="部门名称" value="{{ $department->name }}"
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
                    <button type="submit" class="btn btn-info">
                        <i class="icon fa fa-save"></i> 修改
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
