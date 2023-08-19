@extends('Layout.index')
@section('title', '耗材使用紀錄《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">耗材使用紀錄</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">耗材使用紀錄</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{ Route('usage.create') }}" class="btn btn-success">耗材使用</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" id="listtable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col">領取日期</th>
                                <th scope="col">領取人</th>
                                <th scope="col">進貨單號</th>
                                <th scope="col">耗材名稱</th>
                                <th scope="col">耗材規格</th>
                                <th scope="col">領取數量</th>
                                <th scope="col" class="text-center">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $item->id }}</td>
                                <td>{{ $item->getdate }}</td>
                                <td>{{ $item->receiver }}</td>
                                <td>00(補程式)00</td>
                                <td>{{ $item->Consume->co_standardName }}</td>
                                <td>{{ $item->tag->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <!-- <td>{{ $item->memo }}</td> -->
                                <td class="text-center">
                                    <button type="button" id="sub-btn" data-id="{{ $item->id }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash">
                                        </i>
                                        刪除
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script src="{{ asset('js/Consume/usage/index.js') }}"></script>
@endsection