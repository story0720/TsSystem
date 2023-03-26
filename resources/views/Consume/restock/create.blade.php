@extends('Layout.index')
@section('title', '新增耗材進貨《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">新增耗材進貨</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ Route('restock.index') }}">耗材進貨列表</a></li>
                        <li class="breadcrumb-item active">新增耗材進貨</li>
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
                <form action="{{ Route('restock.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>耗材名稱</label>
                                <select class="form-control" data-type="name" name="coname" id="">
                                    <option value="">請選擇耗材名稱...</option>
                                    @foreach ($consume as $key)
                                    <option value="{{ $key->id }}" {{ old('coname') == $key->id ? 'selected' : '' }}>
                                        {{ $key->co_standardName }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>耗材規格</label>
                                <div class="input-group" data-type="specificationFake">
                                    <input type="text" class="form-control border-right-0" id="" placeholder="請先選擇耗材名稱" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text border-1 border-left-0">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <select class="form-control d-none" data-type="specificationTrue" name="specification" id="specification">
                                    <option>請選擇耗材規格</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>廠商種類(這個不要)</label>
                                <select class="form-control" name="caname" id="caname">
                                    <option value="">請選擇耗材廠商種類...</option>
                                    @foreach ($factorycategory as $key)
                                    <option value="{{ $key->ca_id }}" {{ $key->ca_id == 1 ? 'selected' : '' }}>
                                        {{ $key->ca_Name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>(只有廠商種類是五金耗材的廠商名稱)耗材廠商</label>
                                <select class="form-control" name="Factoryname" id="">
                                    <option value="">請選擇耗材廠商名稱...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">進貨日期</label>
                                <input type="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>進貨單價</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="unitprice" value="{{ old('unitprice') }}" class="form-control" id="UnitPrice" oninput="countall()" placeholder="請輸入進貨單價...">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>進貨數量</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-truck"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" value="{{ old('quantity') }}" name="quantity" id="" min="1" placeholder="請輸入進貨數量..." oninput="countall()">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">小計</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="count" value="{{ old('count') }}" class="form-control text-danger" id="count" min="1" value="0" placeholder="系統自動計算（公式：單價 × 數量）" readonly />
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="memo">備註</label>
                                <textarea class="form-control" name="memo" id="memo" rows="5" placeholder="請輸入備註 ...">{{ old('memo') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">送出</button>
                    </div>
                </form>
                <!-- /.form-->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('script')
<script>
    function countall() {
        var Quantity = $("input[name='quantity']").val();
        var UnitPrice = $("input[name='unitprice']").val();
        $('#count').val(Quantity * UnitPrice);
    }
    $(function() {
        $('select[data-type="name"]').on('change', function() {
            if ($(this).val() !== "") {
                $('div[data-type="specificationFake"]').addClass('d-none');
                $('select[data-type="specificationTrue"]').removeClass('d-none');
            } else {
                $('div[data-type="specificationFake"]').removeClass('d-none');
                $('select[data-type="specificationTrue"]').addClass('d-none');
            }


            let coname = $('select[name="coname"]').val();
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/restock/Gettag",
                data: {
                    id: coname,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    var select = $('#specification');
                    select.empty();
                    select.append('<option>請選擇耗材規格</option>');
                    for (var i = 0; i < result.length; i++) {
                        var option = $('<option>', {
                            value: result[i].id,
                            text: result[i].name
                        });
                        select.append(option);
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });

    $("#caname").change(function() {
        var selectValue = $(this).val();

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/restock/GetFactoryname',
            data: {
                id: selectValue,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                let Factoryname = $('select[name="Factoryname"]');
                Factoryname.empty();
                Factoryname.append('<option>請選擇耗材廠商名稱</option>');
                for (var i = 0; i < result.length; i++) {
                    var option = $('<option>', {
                        value: result[i].ca_id,
                        text: result[i].mn_Name
                    });
                    Factoryname.append(option);
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });


    });

    function callFactoryData() {
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/restock/GetFactoryname',
            data: {
                id: 1,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                let Factoryname = $('select[name="Factoryname"]');
                Factoryname.empty();
                Factoryname.append('<option>請選擇耗材廠商名稱</option>');
                for (var i = 0; i < result.length; i++) {
                    var option = $('<option>', {
                        value: result[i].mn_id,
                        text: result[i].mn_Name
                    });
                    Factoryname.append(option);
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    callFactoryData()
</script>
@endsection