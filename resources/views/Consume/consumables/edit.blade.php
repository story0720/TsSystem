@extends('Layout.index')
@section('title', '編輯耗材《鐵祥企業》')
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
                            <li class="breadcrumb-item"><a href="{{ Route('consume.index') }}">耗材列表</a></li>
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
                                    <input type="text" class="form-control" data-type="name"
                                        name="standardname" value="{{ $edit['co_standardName'] }}" placeholder="請輸入耗材名稱...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group mb-0">
                                        <label for="">耗材規格</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-type="specification"
                                            name="specification" placeholder="請輸入耗材規格...">
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
                                    <textarea class="form-control" date-type="memo" name="memo" id="memo" rows="5" placeholder="請輸入備註 ...">{{ $edit['co_memo'] }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <input type="hidden" name="consumablesEdit">
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
    $(function(){
        // 新增規格按鈕
        $('button[control="add-specification"]').click(function(){
            // 規格
            let $specification = $('input[data-type="specification"]').val();
            // 被新增的項目結構
            let $item = $(`<div class="consumables-specification-item alert alert-info d-inline-flex mb-0 p-0">
                <button type="button" class="close text-white pl-2" data-dismiss="alert"
                    aria-hidden="true" style="opacity: 1;">&times;</button>
                <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                    <span class="consumables-specification">${$specification}</span>
                </div>
            </div>`);
            $("#consumables-specification-list").append($item);
        });
        // 送出按鈕
        $('button[type="submit"]').click(function(){
            let consumablesList = [];

            let $name = $('input[data-type="name"]').val();
            consumablesList.push($name);

            let $list = $("#consumables-specification-list").find('.consumables-specification-item');
            let arrList = [];
            $list.each(function(){
                let $specification = $(this).find('.consumables-specification').text();
                arrList.push($specification);
            });
            consumablesList.push(arrList);

            let $memo = $('textarea[data-type="memo"]').val();
            consumablesList.push($memo);

            $('input[name="consumablesEdit"]').attr("value",consumablesList);
        });
    });
</script>
@endsection