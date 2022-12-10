@extends('Layout.index')
@section('title', '耗材庫存管理《鐵祥企業》')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">耗材庫存管理</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="consumables.html">耗材管理</a></li>
                            <li class="breadcrumb-item active">耗材庫存管理</li>
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
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 2rem;">#</th>
                                    <th>耗材名稱</th>
                                    <th>耗材規格</th>
                                    <th>剩餘庫存</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>內容（耗材名稱）</td>
                                    <td>內容（耗材規格）</td>
                                    <td>內容（剩餘庫存）<br>新增進貨就增加庫存，新增使用就減少庫存。</td>
                                </tr>
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
    </div>
    <!-- ./wrapper -->
@endsection
