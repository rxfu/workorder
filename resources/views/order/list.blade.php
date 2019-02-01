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
                                    <div class="form-check">
                                        <input type="checkbox" id="allItems" name="allItems" value="all">
                                    </div>
                                </th>
                                <th scope="col">工单号</th>
                                <th scope="col">报修种类</th>
                                <th scope="col">报修地点</th>
                                <th scope="col">报修部门</th>
                                <th scope="col">报修人</th>
                                <th scope="col">联系电话</th>
                                <th scope="col">故障描述</th>
                                <th scope="col">维修状态</th>
                                <th scope="col">报修时间</th>
                                <th scope="col">完成人</th>
                                <th scope="col">完成时间</th>
                                <th scope="col">编辑</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                    </div>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->type->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->department->name }}</td>
                                <td>{{ $item->applicant }}</td>
                                <td>{{ $item->telephone }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->status ? '已处理' : '未处理' }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ empty($item->user) ? '' : $item->user->name }}</td>
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
        })
    });
    $('#allItems').change(function () {
        $(':checkbox[name="items[]"]').prop('checked', $(this).is(':checked') ? true : false);
    });

</script>
@endpush
