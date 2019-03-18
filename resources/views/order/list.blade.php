@extends('layouts.page')

@section('title', '管理工单')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">工单列表</h3>
            </div>

            <form id="delete-form" action="{{ url('/order') }}" method="POST">
                @csrf
                @method('delete')

                <div class="box-body">
                    <table id="itemsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="checkbox">
                                        <input type="checkbox" id="allItems" name="allItems" value="all">
                                    </div>
                                </th>
                                <th scope="col">工单号</th>
                                <th scope="col">报修种类</th>
                                <th scope="col">所在校区</th>
                                <th scope="col">报修地点</th>
                                <th scope="col">报修部门</th>
                                <th scope="col">报修人</th>
                                <th scope="col">联系电话</th>
                                <th scope="col">故障描述</th>
                                <th scope="col">故障图片</th>
                                <th scope="col">处理状态</th>
                                <th scope="col">处理结果</th>
                                <th scope="col">报修时间</th>
                                <th scope="col">完成人</th>
                                <th scope="col">完成时间</th>
                                <th scope="col">编辑</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr
                            @if (!$item->status) class="danger" @endif>
                                <td>
                                    <div class="checkbox">
                                        <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                    </div>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->type->name }}</td>
                                <td>{{ $item->campus }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->department->name }}</td>
                                <td>{{ $item->applicant }}</td>
                                <td>{{ $item->telephone }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @isset ($item->pathname)
                                        <a href="{{ asset('storage/' . $item->pathname) }}" title="{{ $item->id }}">
                                            <img src="{{ asset('storage/' . $item->pathname) }}" title="故障图片" width="60">
                                        </a>
                                    @endisset
                                </td>
                                <td>{{ $item->status->name }}</td>
                                <td>{{ $item->result }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ empty($item->user) ? '' : $item->user->realname }}</td>
                                <td>{{ $item->finished_at }}</td>
                                <td>
                                    <a href="{{ route('order.edit', $item->id) }}" class="btn btn-info btn-flat btn-sm"
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
                    <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些工单吗？')">
                        <i class="icon fa fa-trash"></i> 删除
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
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
        }
    });

    $('#allItems').change(function () {
        $(':checkbox[name="items[]"]').prop('checked', $(this).is(':checked') ? true : false);
    });

    $('td').on({
        'change': function() {
            $.ajax({
                'url': '{{ url('order/status') }}/' + $(this).closest('tr').find('input[name="items[]"]').val(),
                'type': 'post',
                'data': {
                    '_method': 'put',
                    '_token': '{{ csrf_token() }}',
                    'dataType': 'json',
                    'status': $(this).val(),
                },
                'success': function(data) {
                    window.location.reload();
                }
            })
            .fail(function(jqXHR) {
                if (422 == jqXHR.status) {
                    $.each(jqXHR.responseJSON, function(key, value) {
                        alert(value);
                    });
                }
            });
        }
    }, 'select#status');
});
</script>
@endpush
