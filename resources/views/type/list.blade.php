@extends('layouts.page')

@section('title', '管理维修种类')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">维修种类列表</h3>
            </div>

            <form id="delete-form" action="{{ url('/type') }}" method="POST">
                @csrf
                @method('delete')

                <div class="box-body no-padding">
                    <table id="itemsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">
                                    <div class="form-check">
                                        <input type="checkbox" id="allItems" name="allItems" value="all">
                                    </div>
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">维修种类名称</th>
                                <th scope="col" class="all">编辑</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $item)
                            <tr>
                                <td></td>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                    </div>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('type.list', ['edit', $item->id]) }}" class="btn btn-info btn-flat btn-sm"
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
                    <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些维修种类吗？')">
                        <i class="icon fa fa-trash"></i> 删除
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($action == 'edit')
    @include('type.edit')
    @else
    @include('type.create')
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
