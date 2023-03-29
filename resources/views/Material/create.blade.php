@extends('Layout.index')
@section('title', '新增材料《鐵祥企業》')
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
                    <h1 class="m-0">新增材料</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="">材料管理</a></li>
                        <li class="breadcrumb-item active">新增材料</li>
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
                            <div class="form-group col">
                                <label for="">材料名稱</label>
                                <input type="text" class="form-control" name="" id="" placeholder="請輸入材料名稱...">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group mb-0">
                                    <label for="">材料規格與單價</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-type="specification" placeholder="請輸入材料規格...">
                                        <input type="text" class="form-control" data-type="price" placeholder="請輸入單價...">
                                        <span class="input-group-append">
                                            <button type="button" control="add-specification" class="btn btn-info btn-flat rounded-right">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="mt-2" id="material-specification-list">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="memo">備註</label>
                                <textarea class="form-control" id="memo" name="memo" rows="5" placeholder="請輸入備註 ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <input type="hidden" name="materialCreate">
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
@endsection
@section('script')
<script src="{{ asset('js/Material/create.js') }}"></script>
@endsection