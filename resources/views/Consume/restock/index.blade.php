@extends('Layout.index')
@section('title', '耗材進貨列表《鐵祥企業》')
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
                            <li class="breadcrumb-item active">耗材進貨列表</li>
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
                        <a href="{{ Route('restock.create') }}" class="btn btn-success">新增耗材進貨</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 2rem;">#</th>
                                    <th>耗材名稱</th>
                                    <th>耗材規格</th>
                                    <th>耗材廠商</th>
                                    <th>進貨日期</th>
                                    <th>進貨數量</th>
                                    <th>進貨單價</th>
                                    <th>小計</th>
                                    <th>備註</th>
                                    <th class="text-center" style="width: 10rem;">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key)
                                    <tr>
                                        <td>{{ $key->id }}</td>
                                        <td>{{ $key->Consume->co_standardName }}</td>
                                        <td>{{ $key->Tag->name }}</td>
                                        <td>{{ $key->GetFactoryName->mn_Name }}</td>
                                        <td>{{ $key->re_date }}</td>
                                        <td>{{ $key->re_unitprice }}</td>
                                        <td>{{ $key->re_quantity }}</td>
                                        <td>{{ $key->re_count }}</td>
                                        <td>{{ $key->re_memo }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" href="{{ Route('restock.edit', $key->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                編輯
                                            </a>
                                            <button type="button" id="sub-btn" data-id="{{$key->id }}" class="btn btn-danger btn-sm">
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
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script src="{{ asset('js/Consume/restock/index.js') }}"></script>
@endsection
