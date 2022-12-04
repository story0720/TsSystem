@extends('Layout.index')
@section('title','加工列表《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">加工列表</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">加工列表</li>
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
                    <a href="{{Route('processing.create')}}" class="btn btn-success">新增加工</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>加工方法</th>
                                <th>加工規格</th>
                                <th>備註</th>
                                <th class="text-center" style="width: 10rem;">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->pr_categoryname}}</td>
                                <td>
                                    <p class="">{{$item->pr_standard}}</p>
                                    <p class="">內容（加工規格）</p>
                                    <p class="">內容（加工規格）</p>
                                </td>
                                <td>{{$item->pr_memo}}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{Route('processing.edit',$item->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        編輯
                                    </a>
                                    <form action="{{Route('processing.delete',$item->id)}}" method="post" class="d-inline">
                                        @method('Delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" >
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
