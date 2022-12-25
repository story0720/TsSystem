@extends('Layout.index')
@section('title', '材料管理《鐵祥企業》')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">材料管理</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">材料管理</li>
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
                    <div class="card-header text-left">
                        <a href="{{ Route('material.create') }}" class="btn btn-success">新增材料</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 2rem;">#</th>
                                    <th>材料名稱</th>
                                    <th class="p-0">
                                        <div class="row m-0 w-100">
                                            <div class="col p-3">材料規格</div>
                                            <div class="col p-3 border-left">單價</div>
                                        </div>
                                    </th>
                                    <th>備註</th>
                                    <th class="text-center" style="width: 10rem;">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>內容（材料名稱）</td>
                                    <td class="p-0">
                                        <div class="row m-0 w-100">
                                            <div class="col p-3 border-bottom">內容（材料規格）</div>
                                            <div class="col p-3 border-bottom border-left">內容（單價）</div>
                                        </div>
                                    </td>
                                    <td>內容（備註）</td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            編輯
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            刪除
                                        </button>
                                    </td>
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
@endsection
