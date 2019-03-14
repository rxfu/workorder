@extends('layouts.page')

@section('title', '管理IP地址')

@section('content')
<div class="row">
    <div class="col-sm-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">IP地址列表</h3>
            </div>

            <form id="delete-form" action="{{ url('/ip') }}" method="POST">
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
                                <th scope="col">类别</th>
                                <th scope="col">校区</th>
                                <th scope="col">楼层</th>
                                <th scope="col">房间</th>
                                <th scope="col">IP地址</th>
                                <th scope="col">MAC地址</th>
                                <th scope="col">用途</th>
                                <th scope="col">机器名</th>
                                <th scope="col">用户名</th>
                                <th scope="col">密码</th>
                                <th scope="col">备注</th>
                                <th scope="col">修改者</th>
                                <th scope="col">创建时间</th>
                                <th scope="col">更新时间</th>
                                <th scope="col">编辑</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ipaddresses as $item)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="items[]" value="{{ $item->id }}">
                                    </div>
                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->campus }}</td>
                                <td>{{ $item->floor }}</td>
                                <td>{{ $item->room }}</td>
                                <td>{{ $item->ip }}</td>
                                <td>{{ $item->mac }}</td>
                                <td>{{ $item->usage }}</td>
                                <td>{{ $item->machine }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->memo }}</td>
                                <td>{{ $item->user->realname }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('ipaddress.list', ['edit', $item->id]) }}" class="btn btn-info btn-flat btn-sm"
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
                    <button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些IP地址吗？')">
                        <i class="icon fa fa-trash"></i> 删除
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($action == 'edit')
    @include('ipaddress.edit')
    @else
    @include('ipaddress.create')
    @endif
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
});
</script>
@endpush
