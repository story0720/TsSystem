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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{Route('order.create')}}">訂單管理</a></li>
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
            <!-- form start -->
            <form action="{{ Route('order.store') }}" method="post" class="orderForm">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            @foreach ($factoryManagement as $item)
                            <div class="form-group col-md-3">
                                <label>廠商名稱</label>
                                <input type="text" class="form-control bg-light border-0" name="TradeName" id="client_name {{ $item->mn_id }}" value="{{ $item->mn_Name }}" readonly>
                            </div>
                            @endforeach

                            <!-- 20230325增加 -->
                            <!-- <div class="form-group col-md-6">
                                    <label><span class="text-danger">*</span>廠商種類</label>
                                    <select class="form-control" name="TradeType" id="client_type">
                                        <option value="">請選擇廠商種類...</option>
                                        <option value="1">畫面測試1...</option>
                                        <option value="2">畫面測試2...</option>
                                    </select>
                                </div> -->
                            <!-- 20230325增加 -->
                            <!-- <div class="form-group col-md-6">
                                    <label><span class="text-danger">*</span>廠商名稱</label>

                                    <div class="input-group" data-type="TradeNameFake">
                                        <input type="text" class="form-control border-right-0" id="" placeholder="請先選擇廠商種類" disabled>
                                        <div class="input-group-append">
                                            <span class="input-group-text border-1 border-left-0">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <select class="form-control d-none" name="TradeName" id="client_name">
                                        <option>請選擇廠商名稱...</option>
                                        @foreach ($factoryManagement as $item)
                                        <option value="{{ $item->mn_id }}">{{ $item->mn_Name }}</option>
                                        @endforeach
                                    </select>
                                </div> -->


                            <div class="form-group col-md-1">
                                <label><span class="text-danger">*</span>加工編號</label>
                                <select class="form-control" name="SerialNumberType">
                                    <option value="0">新</option>
                                    <option value="1">舊</option>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label>新編號</label>
                                <input type="text" name="SerialNumber" class="form-control" placeholder="請輸入加工編號...">
                                <select class="form-control d-none" name="SerialNumberOld">
                                    <option value="">請選擇加工編號...</option>
                                    <option value="num_1">舊加工編號1...</option>
                                    <option value="num_2">舊加工編號2...</option>
                                </select>
                            </div>
                            <!-- <div class="form-group col-md-12">
                                <label for=""><span class="text-danger">*</span>加工方法</label>
                                <select class="form-control" name="CategoryName" id="">
                                    <option value="">請輸入加工方法...</option>
                                    @foreach ($processing as $item)
                                    <option value="{{ $item->id }}">{{ $item->pr_categoryname }}</option>
                                    @endforeach
                                </select>
                            </div> -->

                            <div class="form-group col-md-12">
                                <label for=""><span class="text-danger">*</span>加工方法</label>
                                <!-- 加工方法選擇框 -->
                                <select class="form-control" id="categoryNames">
                                    <option value="">請選擇加工方法...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for=""><span class="text-danger">*</span>加工規格</label>
                                <!-- 標準選擇框 (初始為空) -->
                                <select class="form-control" id="standards">
                                    <option value="">請選擇標準...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for=""><span class="text-danger">*</span>對應單價</label>
                                <!-- 價格顯示 (初始為空) -->
                                <input type="text" class="form-control" id="price" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>加工規格</label>
                                <div class="input-group" data-type="specificationFake">
                                    <input type="text" class="form-control border-right-0" id="" placeholder="請先選擇加工規格" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text border-1 border-left-0">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <select class="form-control d-none" data-type="specificationTrue" name="specification">
                                    <option value="">請選擇加工規格...</option>
                                    <option value="1">畫面測試1...</option>
                                    <option value="2">畫面測試2...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>加工單價</label><!-- 金額(成品單價) -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="Unitprice" class="form-control" id="Unitprice" readonly placeholder="規格單價" oninput="count()">
                                </div>
                            </div>
                            <!-- 20230325增加 -->
                            <div class="form-group col-md-6">
                                <label>鑽孔</label>
                                <select class="form-control" name="drillingType">
                                    <option value="0">無鑽孔</option>
                                    <option value="1">基本孔數以下含基本孔數</option>
                                    <option value="2">依孔數</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">孔數</label>
                                <div class="input-group" data-type="drillingAmountFake">
                                    <input type="text" class="form-control border-right-0" id="" placeholder="不需輸入孔數" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text border-1 border-left-0">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="number" value="0" name="" data-type="drillingAmountTrue" class="form-control d-none" placeholder="請輸入鑽孔的孔數..." />
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">單價</label>
                                <div class="input-group" data-type="drillingPriceFake">
                                    <input type="text" class="form-control border-right-0" id="" placeholder="不需輸入單價" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text border-1 border-left-0">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="number" value="0" name="" data-type="drillingPriceTrue" class="form-control d-none" placeholder="請輸入鑽孔的單價..." />
                            </div>
                            <div class="form-group col-md-6">
                                <label>凹槽</label>
                                <select class="form-control" name="groove">
                                    <option value="1">有</option>
                                    <option value="0">無</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">單價</label>
                                <div class="input-group" data-type="groovePriceFake">
                                    <input type="text" class="form-control border-right-0" id="" placeholder="不需輸入單價" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text border-1 border-left-0">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="number" value="0" name="" data-type="groovePriceTrue" class="form-control d-none" placeholder="請輸入凹槽的單價..." />
                            </div>
                            <!-- 20230325增加 -->
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>出貨日期</label>
                                <input type="date" value="{{date('Y-m-d')}}" name="Shipdate" class="form-control" placeholder="請輸入出貨日期..." />
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>應交數量</label>
                                <input type="number" name="Estimatedquantity" class="form-control" id="Estimatedquantity" min="0" value="0" placeholder="請輸入應交數量..." oninput="count()">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">小計</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="Count" class="form-control text-danger" id="Count" min="0" placeholder="系統計算（加工單價 × 應交數量）+（依孔數單價 × 鑽孔孔數）+（依料件單價 × 應交數量）+（無凹槽單價 × 應交數量）">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>發料日期</label>
                                <input type="date" value="{{date('Y-m-d')}}" name="Materialdate" class="form-control" placeholder="請輸入發料日期..." />
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>發料數量</label>
                                <input type="number" class="form-control" id="" min="0" value="0" placeholder="請輸入發料數量...">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="order_memo">備註</label>
                                <textarea class="form-control" id="order_memo" rows="5" name="Memo" placeholder="請輸入備註..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-primary">123</button>
                        <button type="submit" class="btn btn-primary">送出</button>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
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
@section('script')
<script src="{{ asset('js/Order/create.js') }}"></script>
@endsection