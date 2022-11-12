@extends('layout.index')
@section('title','耗材月結查詢《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">耗材月結查詢</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="consumables.html">耗材管理</a></li>
                        <li class="breadcrumb-item active">耗材月結查詢</li>
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
                <div class="card-header row">
                    <div class="col-md-6">
                        <select class="form-control" name="" id="">
                            <option value="">2022/09</option>
                            <option value="">2022/08</option>
                            <option value="">2022/07</option>
                        </select>
                    </div>
                    <div class="col-md-3 rounded">
                        <div class="row bg-light">
                            <span class="col-3 py-2 bg-info rounded-left">月總結</span>
                            <span class="col-9 py-2">${{$money}}</span>
                        </div>
                    </div>
                    <div class="col-md-3 py-2">
                        ※ 月結方式：上月26日至每月25日前。
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 2rem;">#</th>
                                <th>耗材名稱</th>
                                <th>耗材規格</th>
                                <th>耗材廠商</th>
                                <th>進貨日期</th>
                                <th>進貨單價</th>
                                <th>進貨數量</th>
                                <th>小計</th>
                                <th>備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->Consume->co_standardName}}</td>
                                <td>內容（耗材規格）</td>
                                <td>{{$item->FactoryCategory->ca_Name}}</td>
                                <td>{{$item->re_date}}</td>
                                <td>{{$item->re_quantity}}</td>
                                <td>{{$item->re_unitprice}}</td>
                                <td>{{$item->re_count}}</td>
                                <td>{{$item->re_memo}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
