@extends('Layout.index')
@section('title', '編輯加工《鐵祥企業》')
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
                    <h1 class="m-0">編輯加工</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ Route('processing.index') }}">加工列表</a></li>
                        <li class="breadcrumb-item active">編輯加工</li>
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
                <form action="{{ Route('processing.update', $edit['id']) }}" method="post">
                    @method('Put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col">
                                <label for=""><span class="text-danger">*</span>加工方法</label>
                                <input type="text" class="form-control" name="categoryname" id="" data-type="processingMain" placeholder="請輸入加工方法..." value="{{ $edit['pr_categoryname'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group mb-0">
                                    <label for=""><span class="text-danger">*</span>加工規格與單價</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" data-type="specification" name="" placeholder="請輸入加工規格...">
                                        <input type="text" class="form-control" data-type="price" name="" placeholder="請輸入單價...">
                                        <span class="input-group-append">
                                            <button type="button" control="add-specification" class="btn btn-info btn-flat rounded-right">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="mt-2" id="processing-specification-list">
                                    @foreach ($edit->Prtags as $key)
                                    <div class="processing-specification-item alert alert-info d-inline-flex mb-0 mr-1 p-0">
                                        <button type="button" class="close text-white pl-2" style="opacity: 1;">&times;</button>
                                        <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                                            <span class="processing-specification">{{ $key->pr_standard }}</span>
                                            <div class="ml-1 badge badge-light" style="font-size: 1.05rem;">
                                                <span class="processing-price">${{ $key->pr_price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="client_memo">備註</label>
                                <textarea class="form-control" id="client_memo" name="memo" rows="5" placeholder="請輸入備註 ...">{{ $edit['pr_memo'] }}</textarea>
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
<script src="{{ asset('js/Processing/edit.js') }}"></script>
@endsection