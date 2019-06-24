@extends('layouts.page')

@section('title', '数据统计')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">维修类型统计</h3>
            </div>
            <div class="box-body no-padding">
                <table id="itemsTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">维修类型</th>
                            @foreach ($users as $user)
                                <th scope="col">{{ $user->realname }}</th>      
                            @endforeach
                            <th scope="col">合计</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                        <tr>
                            <th>{{ $type->name }}</th>
                            @foreach ($users as $user)
                                <td>{{ $type->orders()->countUsers($user->id) }}</td>
                            @endforeach
                            <th>{{ $type->orders()->count() }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th scope="col">总计</th>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($users as $user)
                            <th scope="col">{{ $total += $user->orders()->count() }}</th>
                        @endforeach
                        <th scope="col">{{ $total }}</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
