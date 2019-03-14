@extends('layouts.page')

@section('title', '工单管理')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="box box-info">
            <div class="box-header with-border">
                <div class="box-title">编辑工单{{ $order->id }}</div>
            </div>

            <form role="form" id="edit-form" name="edit-form" method="POST" action="{{ url('/order/' . $order->id) }}"
                aria-label="编辑工单" class="form-horizontal">
                @csrf
                @method('put')

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">工单号</label>
                        <div class="col-md-8">
                            <div class="form-control-static">{{ $order->id }}</div>
                        </div>
                    </div>
                    <div class="form-group has-feedback{{ $errors->has('type_id') ? ' has-error' : '' }}">
                        <label for="type_id" class="col-sm-4 control-label">报修种类</label>
                        <div class="col-md-8">
                            <select name="type_id" id="type_id" class="form-control">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"{{ $order->type_id === $type->id ? ' selected' : ''}}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('type_id'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('type_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('campus') ? ' has-error' : '' }}">
                        <label for="campus" class="col-sm-2 control-label">所在校区</label>
                        <div class="col-md-10">
                            <select name="campus" id="campus" class="form-control">
                                <option value="雁山"{{ $order->campus === '雁山' ? ' selected' : '' }}>雁山</option>
                                <option value="育才"{{ $order->campus === '育才' ? ' selected' : '' }}>育才</option>
                                <option value="王城"{{ $order->campus === '王城' ? ' selected' : '' }}>王城</option>
                            </select>
                            @if ($errors->has('campus'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('campus') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-sm-4 control-label">报修地点</label>
                        <div class="col-md-8">
                            <input id="address" type="text" class="form-control" name="address" placeholder="报修地点"
                                value="{{ $order->address }}" required>
                            @if ($errors->has('address'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('department_id') ? ' has-error' : '' }}">
                        <label for="department_id" class="col-sm-4 control-label">报修部门</label>
                        <div class="col-md-8">
                            <select name="department_id" id="department_id" class="form-control">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"{{ $order->department_id === $department->id ? ' selected' : '' }}>{{ $department->name }}</option>
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
                        <label for="applicant" class="col-sm-4 control-label">报修人</label>
                        <div class="col-md-8">
                            <input id="applicant" type="text" class="form-control" name="applicant" placeholder="报修人"
                                value="{{ $order->applicant }}" required>
                            @if ($errors->has('applicant'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('applicant') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('telephone') ? ' has-error' : '' }}">
                        <label for="telephone" class="col-sm-4 control-label">联系电话</label>
                        <div class="col-md-8">
                            <input id="telephone" type="text" class="form-control" name="telephone" placeholder="联系电话"
                                value="{{ $order->telephone }}">
                            @if ($errors->has('telephone'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-4 control-label">故障描述</label>
                        <div class="col-md-8">
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                                required>{{ $order->description }}</textarea>
                            @if ($errors->has('description'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
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
</div>
@stop
