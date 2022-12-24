@extends('Layout.index')
@section('title', '編輯耗材 《鐵祥企業》')
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
                        <h1 class="m-0">編輯耗材</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ Route('consume.index') }}">耗材列表</a></li>
                            <li class="breadcrumb-item active">編輯耗材</li>
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
                    <form action="{{ Route('consume.update', $edit['id']) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="tag">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">耗材名稱</label>
                                    <input type="text" class="form-control" name="standardname"
                                        value="{{ $edit['co_standardName'] }}" id="" placeholder="請輸入耗材名稱...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group mb-0">
                                        <label for="">耗材規格</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="standard"
                                                placeholder="請輸入加工規格...">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                    <div class="alert alert-dismissible mb-0 pt-2 pb-0 pr-5 pl-0">
                                        <button type="button" class="close pl-1 pb-1" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <div class="input-group">
                                            <span class="pl-3 pr-2 py-1">1</span>
                                            <input type="text" class="form-control form-control-sm" value="規格1"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="alert alert-dismissible mb-0 pt-2 pb-0 pr-5 pl-0">
                                        <button type="button" class="close pl-1 pb-1" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <div class="input-group">
                                            <span class="pl-3 pr-2 py-1">2</span>
                                            <input type="text" class="form-control form-control-sm" value="規格2"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="client_memo">備註</label>
                                    <textarea class="form-control" name="memo" id="client_memo" rows="5" placeholder="請輸入備註 ...">{{ $edit['co_memo'] }}</textarea>
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
<script>
    function addTag() {
        let sp = $("input[name='specification']").val();
        var tag = $("input[name='tag']").val();
        $("input[name='tag']").val(sp + ',' + tag);
        let newtag = $("#tag").append("<span class='badge badge-info'>" + sp + "</span>")
        $("input[name='specification']").val("");
    }
</script>
