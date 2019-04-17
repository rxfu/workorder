@extends('layouts.page')

@section('title', '管理状态')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">状态列表</h3>
            </div>

            <form id="delete-form" action="{{ url('/status') }}" method="POST">
                @csrf
                @method('delete')

                <div class="box-body no-padding">
                    <table id="itemsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check">
                                        <input type="checkbox" id="allItems" name="allItems" value="all">
                                    </div>
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">状态名称</th>
                                <th scope="col">是否启用</th>
                                <th scope="col">是否显示</th>
                                <th scope="col" class="all">编辑</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $item)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                    </div>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->is_enable ? '是' : '否' }}</td>
                                <td>{{ $item->is_displayed ? '是' : '否' }}</td>
                                <td>
                                    <a href="{{ route('status.list', ['edit', $item->id]) }}" class="btn btn-info btn-flat btn-sm"
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
                    <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些状态吗？')">
                        <i class="icon fa fa-trash"></i> 删除
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($action == 'edit')
    @include('status.edit')
    @else
    @include('status.create')
    @endif
</div>
@endsection

@push('styles')
<link href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables.net/responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net/responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net/responsive/js/responsive.bootstrap.min.js') }}"></script>
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
});
</script>
@endpush
