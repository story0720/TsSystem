@extends('Layout.index')
@section('title', '耗材月結查詢《鐵祥企業》')
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
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                    <div class="card-header">
                        <!--d-flex align-items-center justify-content-between-->
                        <div class="d-flex">
                            <div class="flex-fill flex-grow-1 mr-3">
                                <input type="number" class="form-control" placeholder="請輸入年份(數字)" min="2022">
                            </div>
                            <div class="flex-fill flex-grow-1 mr-3">
                                <input type="number" class="form-control" placeholder="請輸入月份(數字)" min="1"
                                    max="12">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">查詢</button>
                            </div>
                            <div class="flex-fill rounded mx-3">
                                <div class="d-flex">
                                    <div class="px-4 py-2 bg-info rounded-left">月總結</div>
                                    <div class="flex-grow-1 p-2 bg-light">${{ $money }}</div>
                                </div>
                            </div>
                            <div class="py-2">
                                ※ 月結方式：上月26日至每月25日前。
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered" id="listtable">
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
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->Consume->co_standardName }}</td>
                                        <td>內容（耗材規格）</td>
                                        <td>{{ $item->FactoryCategory->ca_Name }}</td>
                                        <td>{{ $item->re_date }}</td>
                                        <td>{{ $item->re_quantity }}</td>
                                        <td>{{ $item->re_unitprice }}</td>
                                        <td>{{ $item->re_count }}</td>
                                        <td>{{ $item->re_memo }}</td>
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
    <script src="{{ asset('js/Consume/monthly/index.js') }}"></script>
@endsection
