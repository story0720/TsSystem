@extends('Layout.index')
@section('title','耗材進貨列表 《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">耗材進貨列表</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">進貨列表</li>
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
                    <a href="{{Route('restock.create')}}" class="btn btn-success">耗材進貨</a>
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
                                <th class="text-center" style="width: 10rem;">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key)
                            <tr>
                                <td>{{$key->id}}</td>
                                <td>{{$key->Consume->co_standardName}}</td>
                                <td>內容（耗材規格）</td>
                                <td>{{$key->FactoryCategory->ca_Name}}</td>
                                <td>{{$key->re_date}}</td>
                                <td>{{$key->re_quantity}}</td>
                                <td>{{$key->re_unitprice}}</td>
                                <td>{{$key->re_count}}</td>
                                <td>{{$key->re_memo}}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        編輯
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        刪除
                                    </a>
                                </td>
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
@endsection
