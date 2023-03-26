@extends('Layout.index')
@section('title', '新增加工《鐵祥企業》')
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
                    <h1 class="m-0">新增加工</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ Route('processing.index') }}">加工列表</a></li>
                        <li class="breadcrumb-item active">新增加工</li>
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
                <form action="{{ Route('processing.store') }}" method="post" class="processingForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col">
                                <label for=""><span class="text-danger">*</span>加工方法</label>
                                <input type="text" class="form-control" name="categoryname" id="" data-type="processingMain" value="{{old('categoryname')}}" placeholder="請輸入加工方法...">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group mb-0">
                                    <label for=""><span class="text-danger">*</span>加工規格與單價</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-type="specification" placeholder="請輸入加工規格...">
                                        <input type="number" min="0" class="form-control" data-type="price" placeholder="請輸入單價...">
                                        <span class="input-group-append">
                                            <button type="button" control="add-specification" class="btn btn-info btn-flat rounded-right">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="mt-2" id="processing-specification-list">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="client_memo">備註</label>
                                <textarea class="form-control" id="client_memo" name="memo" data-type="memo" rows="5" placeholder="請輸入備註 ...">{{old('memo')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <input type="hidden" name="processingCreate">
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
<script src="{{ asset('js/Processing/create.js') }}"></script>
@endsection