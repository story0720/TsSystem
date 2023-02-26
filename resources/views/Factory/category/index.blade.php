@extends('Layout.index')
@section('title','廠商種類《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">廠商種類</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">廠商種類</li>
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
                    <a href="{{Route('category.create')}}" class="btn btn-success">新增種類</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 2rem;">#</th>
                                <th>種類</th>
                                <th>備註</th>
                                <th class="text-center" style="width: 10rem;">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td>{{$item->ca_id}}</td>
                                <td>{{$item->ca_Name}}</td>
                                <td>{{$item->ca_Memo}}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{Route('category.edit',$item->ca_id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        編輯
                                    </a>
                                    <form action="{{Route('category.delete',$item->ca_id)}}" method="post"  class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            刪除
                                        </button>
                                    </form>
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
