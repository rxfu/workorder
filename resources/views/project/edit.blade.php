<div class="col-sm-4">
    <div class="box box-info">
        <div class="box-header with-border text-center">
            <div class="box-title">编辑项目</div>
        </div>

        <form role="form" id="edit-form" name="edit-form" method="POST" action="{{ url('/project') }}" aria-label="编辑项目" class="form-horizontal">
            @csrf

            <div class="box-body">
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">项目名称</label>
                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control" name="name" placeholder="项目名称"
                            value="{{ $project->name }}" required>
                        @if ($errors->has('name'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label for="content" class="col-sm-2 control-label">项目内容</label>
                    <div class="col-md-10">
                        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $project->content }}</textarea>
                        @if ($errors->has('content'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('participant') ? ' has-error' : '' }}">
                    <label for="participant" class="col-sm-2 control-label">参与人员</label>
                    <div class="col-md-10">
                        <input id="participant" type="text" class="form-control" name="participant" placeholder="参与人员" value="{{ $project->participant }}">
                        @if ($errors->has('participant'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('participant') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('begin_at') ? ' has-error' : '' }}">
                    <label for="begin_at" class="col-sm-2 control-label">起始时间</label>
                    <div class="col-md-10">
                        <input id="begin_at" type="text" class="form-control" name="begin_at" placeholder="起始时间" value="{{ $project->begin_at }}" required>
                        @if ($errors->has('begin_at'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('begin_at') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback{{ $errors->has('end_at') ? ' has-error' : '' }}">
                    <label for="end_at" class="col-sm-2 control-label">结束时间</label>
                    <div class="col-md-10">
                        <input id="end_at" type="text" class="form-control" name="end_at" placeholder="结束时间" value="{{ $project->end_at }}" required>
                        @if ($errors->has('end_at'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('end_at') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <div class="col-sm-offset-5">
                    <button type="submit" class="btn btn-success">
                        <i class="icon fa fa-plus"></i> 创建
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
