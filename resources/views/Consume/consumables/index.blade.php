@extends('Layout.index')
@section('title','耗材列表《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">耗材列表</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">耗材列表</li>
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
                    <a href="{{Route('consume.create')}}" class="btn btn-success">新增耗材</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" id="listtable">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 2rem;">#</th>
                                <th>耗材名稱</th>
                                <th>耗材規格</th>
                                <th>備註</th>
                                <th class="text-center" style="width: 10rem;">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->co_standardName}}</td>
                                <td class="p-0">
                                    @foreach($item->Tags as $key)
                                    <div class="p-3 border-bottom">{{$key->name}}</div>
                                    @endforeach
                                </td>
                                <td>{{$item->co_memo}}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{Route('consume.edit',$item->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        編輯
                                    </a>
                                    <form action="{{Route('consume.delete',$item->id)}}" method="post" class="d-inline">
                                        @method('Delete')
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
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection

@section('script')    
    <script src="{{ asset('js/Consume/consumables/index.js') }}"></script>
@endsection
