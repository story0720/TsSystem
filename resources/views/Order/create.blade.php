@extends('Layout.index')
@section('title', '新增訂單《鐵祥企業》')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">新增訂單</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="order.html">訂單管理</a></li>
                            <li class="breadcrumb-item active">新增訂單</li>
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
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>廠商名稱</label>
                                    <select class="form-control" id="client_name">
                                        <option>請選擇廠商名稱...</option>
                                        @foreach ($factoryManagement as $item)
                                            <option value="{{ $item->mn_id }}">{{ $item->mn_Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">加工編號</label>
                                    <input type="text" class="form-control" id="" placeholder="請輸入加工編號...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">加工種類</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">請輸入加工種類...</option>
                                        @foreach ($processing as $item)
                                            <option value="{{ $item->id }}">{{ $item->pr_categoryname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">加工規格</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border-right-0" id=""
                                            placeholder="請先選擇加工規格" disabled>
                                        <div class="input-group-append">
                                            <span class="input-group-text border-1 border-left-0">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <select class="form-control d-none" name="" id="">
                                        <option value="">請選擇加工規格</option>
                                        <option value="">加工規格1</option>
                                        <option value="">加工規格2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">發料日期</label>
                                    <input type="date" value="2022-12-31" class="form-control"
                                        placeholder="請輸入發料日期..." />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">發料數量</label>
                                    <input type="number" class="form-control" id="" min="0" value="0"
                                        placeholder="請輸入發料數量...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">出貨日期</label>
                                    <input type="date" value="2022-12-31" class="form-control"
                                        placeholder="請輸入出貨日期..." />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">應交數量</label>
                                    <input type="number" class="form-control" id="" min="0" value="0"
                                        placeholder="請輸入應交數量...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">金額(成品單價)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id=""
                                            placeholder="請輸入金額(成品單價)...">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">小計</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-dollar-sign"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control text-danger" id="" min="0"
                                            value="0" placeholder="系統自動計算（公式：單價 × 應交數量）" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <!-- /.form-->
                </div>
                <!-- /.card -->
                <div class="card">
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="order_memo">備註</label>
                                    <textarea class="form-control" id="order_memo" rows="5" placeholder="請輸入備註..."></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">送出</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                    <!-- /.form-->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
