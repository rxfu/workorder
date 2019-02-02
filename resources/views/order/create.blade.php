@extends('layouts.frontend')

@section('title', '创建工单')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="box box-success">
                <div class="box-header with-border text-center">
                    <div class="box-title">{{ config('app.name', 'Laravel') }}</div>
                </div>

                <form role="form" id="create-form" name="create-form" method="POST" action="{{ url('/order') }}"
                    aria-label="创建工单" class="form-horizontal">
                    @csrf

                    <div class="box-body">
                        <div class="form-group has-feedback{{ $errors->has('type_id') ? ' has-error' : '' }}">
                            <label for="type_id" class="col-sm-2 control-label">报修种类</label>
                            <div class="col-md-10">
                                <select name="type_id" id="type_id" class="form-control">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_id'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('type_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-sm-2 control-label">报修地点</label>
                            <div class="col-md-10">
                                <input id="address" type="text" class="form-control" name="address" placeholder="报修地点"
                                    value="{{ old('address') }}" required>
                                @if ($errors->has('address'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('department_id') ? ' has-error' : '' }}">
                            <label for="department_id" class="col-sm-2 control-label">报修部门</label>
                            <div class="col-md-10">
                                <select name="department_id" id="department_id" class="form-control">
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('department_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('applicant') ? ' has-error' : '' }}">
                            <label for="applicant" class="col-sm-2 control-label">报修人</label>
                            <div class="col-md-10">
                                <input id="applicant" type="text" class="form-control" name="applicant" placeholder="报修人"
                                    value="{{ old('applicant') }}" required>
                                @if ($errors->has('applicant'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('applicant') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="telephone" class="col-sm-2 control-label">联系电话</label>
                            <div class="col-md-10">
                                <input id="telephone" type="text" class="form-control" name="telephone" placeholder="联系电话"
                                    value="{{ old('telephone') }}">
                                @if ($errors->has('telephone'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-sm-2 control-label">故障描述</label>
                            <div class="col-md-10">
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                                    required>{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                <span class="help-block" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
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
