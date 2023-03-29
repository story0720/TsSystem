@extends('Layout.index')
@section('title', '新增耗材《鐵祥企業》')
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
                    <h1 class="m-0">新增耗材</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ Route('consume.index') }}">耗材列表</a></li>
                        <li class="breadcrumb-item active">新增耗材</li>
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
                <form action="{{ Route('consume.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tag">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col">
                                <label for=""><span class="text-danger">*</span>耗材名稱</label>
                                <input type="text" class="form-control" data-type="name" value="{{ old('standardname') }}" name="standardname" placeholder="請輸入耗材名稱...">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group mb-0">
                                    <label for=""><span class="text-danger">*</span>耗材規格</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-type="specification" name="" placeholder="請輸入耗材規格...">
                                        <span class="input-group-append">
                                            <button type="button" control="add-specification" class="btn btn-info btn-flat rounded-right">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="mt-2" id="consumables-specification-list">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="memo">備註</label>
                                <textarea class="form-control" date-type="memo" name="memo" id="memo" rows="5" placeholder="請輸入備註 ...">{{ old('memo') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <input type="hidden" name="specification">
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
<script src="{{ asset('js/Consume/consumables/create.js') }}"></script>
@endsection