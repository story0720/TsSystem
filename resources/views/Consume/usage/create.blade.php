@extends('Layout.index')
@section('title', '耗材使用')
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
                    <h1 class="m-0">耗材使用</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ Route('usage.index') }}">耗材使用紀錄</a></li>
                        <li class="breadcrumb-item active">耗材使用</li>
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
                <form action="{{ Route('usage.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>請選擇單號</label>
                                <select class="form-control" name="order_number" id="">
                                    <option value="">請選擇單號...</option>
                                    @foreach ($order_number as $key)
                                    <option value="{{ $key->id }}" {{ old('order_number') == $key->id ? 'selected' : '' }}>
                                        {{ $key->restock_order_number }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>耗材名稱</label>
                                <select class="form-control" data-type="name" name="coname" id="">
                                    <option value="">請選擇耗材名稱...</option>
                                    @foreach ($data as $key)
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
                                <label for=""><span class="text-danger">*</span>領取數量</label>
                                <input type="number" name="quantity" class="form-control" min="0" value="0" value="old('quantity')" placeholder="請輸入領取數量..." />
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""><span class="text-danger">*</span>領取人</label>
                                <input type="text" name="receiver" class="form-control" placeholder="請輸入領取人姓名..." />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="client_memo">備註</label>
                                <textarea class="form-control" id="client_memo" rows="5" name='memo' value="old('memo')" placeholder="請輸入備註 ..."></textarea>
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
<!-- /.content-wrapper -->


</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script src="{{ asset('js/Consume/usage/create.js') }}"></script>
<!-- <script src="{{ asset('js/Consume/consumables/index.js') }}"></script> -->
@endsection