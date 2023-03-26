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
            <div class="card">
                <!-- form start -->
                <form action="{{ Route('order.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- 20230325增加 -->
                            <div class="form-group col-md-6">
                                <label><span class="text-danger">*</span>廠商種類</label>
                                <select class="form-control" name="TradeType" id="client_type">
                                    <option value="">請選擇廠商種類...</option>
                                    <option value="1">畫面測試1...</option>
                                    <option value="2">畫面測試2...</option>
                                </select>
                            </div>
                            <!-- 20230325增加 -->
                            <div class="form-group col-md-6">
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
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>加工編號</label>
                                <input type="text" name="SerialNumber" class="form-control" id="" placeholder="請輸入加工編號...">
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>加工方法</label>
                                <select class="form-control" name="CategoryName" id="">
                                    <option value="">請輸入加工方法...</option>
                                    @foreach ($processing as $item)
                                    <option value="{{ $item->id }}">{{ $item->pr_categoryname }}</option>
                                    @endforeach
                                </select>
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
                                    <option value="1">依料件數</option>
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
                                <input type="number" value="" name="" data-type="drillingAmountTrue" class="form-control d-none" placeholder="請輸入鑽孔的孔數..." />
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
                                <input type="number" value="" name="" data-type="drillingPriceTrue" class="form-control d-none" placeholder="請輸入鑽孔的單價..." />
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
                                <input type="number" value="" name="" data-type="groovePriceTrue" class="form-control d-none" placeholder="請輸入凹槽的單價..." />
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
@section('script')
<script>
    function count() {
        var Estimatedquantity = $("input[name='Estimatedquantity']").val();
        var Unitprice = $("input[name='Unitprice']").val();
        $('#Count').val(Estimatedquantity * Unitprice);
    }

    // 20230325 增加
    $(function() {
        $('select[name="TradeType"]').on('change', function() {
            if ($(this).val() !== "") {
                $('div[data-type="TradeNameFake"]').addClass('d-none');
                $('select[name="TradeName"]').removeClass('d-none');
            } else {
                $('div[data-type="TradeNameFake"]').removeClass('d-none');
                $('select[name="TradeName"]').addClass('d-none');
            }
        });
        $('select[name="CategoryName"]').on('change', function() {
            if ($(this).val() !== "") {
                $('div[data-type="specificationFake"]').addClass('d-none');
                $('select[data-type="specificationTrue"]').removeClass('d-none');
            } else {
                $('div[data-type="specificationFake"]').removeClass('d-none');
                $('select[data-type="specificationTrue"]').addClass('d-none');
            }
        });
        $('select[name="drillingType"]').on('change', function() {
            if ($(this).val() == "1") {
                $('div[data-type="drillingAmountFake"]').removeClass('d-none');
                $('input[data-type="drillingAmountTrue"]').addClass('d-none');
                $('div[data-type="drillingPriceFake"]').addClass('d-none');
                $('input[data-type="drillingPriceTrue"]').removeClass('d-none');
            } else if ($(this).val() == "2") {
                $('div[data-type="drillingAmountFake"]').addClass('d-none');
                $('input[data-type="drillingAmountTrue"]').removeClass('d-none');
                $('div[data-type="drillingPriceFake"]').addClass('d-none');
                $('input[data-type="drillingPriceTrue"]').removeClass('d-none');
            } else {
                $('div[data-type="drillingAmountFake"]').removeClass('d-none');
                $('input[data-type="drillingAmountTrue"]').addClass('d-none');
                $('div[data-type="drillingPriceFake"]').removeClass('d-none');
                $('input[data-type="drillingPriceTrue"]').addClass('d-none');
            }
        });
        $('select[name="groove"]').on('change', function() {
            if ($(this).val() !== "1") {
                $('div[data-type="groovePriceFake"]').addClass('d-none');
                $('input[data-type="groovePriceTrue"]').removeClass('d-none');
            } else {
                $('div[data-type="groovePriceFake"]').removeClass('d-none');
                $('input[data-type="groovePriceTrue"]').addClass('d-none');
            }
        });
    });
    // 20230325 增加
</script>
@endsection