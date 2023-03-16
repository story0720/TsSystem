@extends('Layout.index')
@section('title','耗材使用紀錄《鐵祥企業》')
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
                    <a href="{{Route('usage.create')}}" class="btn btn-success">耗材使用</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" id="listtable">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 2rem;">#</th>
                                <th scope="col">領取日期</th>
                                <th scope="col">領取人</th>
                                <th scope="row">耗材名稱</th>
                                <th scope="row">耗材規格</th>
                                <th scope="col">領取數量</th>
                                <th scope="col">備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->getdate}}</td>
                                <td>{{$item->receiver}}</td>
                                <td>{{$item->Consume->co_memo}}</td>
                                <td>內容（耗材規格）</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->memo}}</td>
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
