@extends('layouts.page')

@section('title', '管理项目')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">项目列表</h3>
            </div>

            <form id="delete-form" action="{{ url('/project') }}" method="POST">
                @csrf
                @method('delete')

                <div class="box-body">
                    <table id="itemsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">
                                    <div class="checkbox">
                                        <input type="checkbox" id="allItems" name="allItems" value="all">
                                    </div>
                                </th>
                                <th scope="col">项目单号</th>
                                <th scope="col">名称</th>
                                <th scope="col">内容</th>
                                <th scope="col">起始时间</th>
                                <th scope="col">结束时间</th>
                                <th scope="col">负责人</th>
                                <th scope="col">参与人</th>
                                <th scope="col" class="all">编辑</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $item)
                            <tr>
                                <td></td>
                                <td>
                                    <div class="checkbox">
                                        <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                    </div>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->begin_at }}</td>
                                <td>{{ $item->end_at }}</td>
                                <td>{{ $item->user->realname }}</td>
                                <td>{{ $item->participant }}</td>
                                <td>
                                    <a href="{{ route('project.list', ['edit', $item->id]) }}" class="btn btn-info btn-flat btn-sm"
                                        title="编辑">
                                        <i class="icon fa fa-edit"></i> 编辑
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些项目吗？')">
                        <i class="icon fa fa-trash"></i> 删除
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($action == 'edit')
    @include('project.edit')
    @else
    @include('project.create')
    @endif
</div>
@endsection

@push('styles')
<link href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables.net/responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net/responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net/responsive/js/responsive.bootstrap.min.js') }}"></script>
<!-- Date Picker 1.8.0 -->
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-CN.min.js') }}"></script>
<script>
$(function () {
    $('#itemsTable').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'language': {
            'url': "{{ asset('vendor/datatables.net/lang/Chinese.json') }}"
        },
        'responsive': {
            'details': {
                'type': "column",
                'target': 0
            }
        },
        'columnDefs': [{
            'orderable': false,
            'targets': 1
        }, {
            'className': 'control',
            'orderable': false,
            'targets': 0
        }],
    });
    $('#allItems').change(function () {
        $(':checkbox[name="items[]"]').prop('checked', $(this).is(':checked') ? true : false);
    });
    $('.datepicker').datepicker({
        'language': 'zh-CN',
        'todayBtn': true,
        'todayHighlight': true,
        'format': 'yyyy-mm-dd'
    });
});
</script>
@endpush
