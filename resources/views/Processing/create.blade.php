@extends('Layout.index')
@section('title', '新增加工《鐵祥企業》')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">新增加工</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <form action="{{ Route('processing.store') }}" method="post">
                        @csrf
                        <input type="hidden" id="standard" name="standard" value="">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">加工方法</label>
                                    <input type="text" class="form-control" name="Categoryname" id=""
                                        placeholder="請輸入加工種類...">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group mb-0">
                                        <label for="">加工規格與單價</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-type="specification" placeholder="請輸入加工規格...">
                                            <input type="text" class="form-control" data-type="price" placeholder="請輸入單價...">
                                            <span class="input-group-append">
                                                <button type="button" control="add-specification" class="btn btn-info btn-flat rounded-right">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <div class="mt-2" id="processing-specification-list">
                                        <div class="processing-specification-item alert alert-info d-inline-flex mb-0 p-0">
                                            <button type="button" class="close text-white pl-2" data-dismiss="alert"
                                                aria-hidden="true" style="opacity: 1;">&times;</button>
                                            <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                                                <span class="processing-specification">單面</span>
                                                <div class="ml-1 badge badge-light" style="font-size: 1.05rem;">
                                                    <span class="processing-price">$2,000</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="processing-specification-item alert alert-info d-inline-flex mb-0 p-0">
                                            <button type="button" class="close text-white pl-2" data-dismiss="alert"
                                                aria-hidden="true" style="opacity: 1;">&times;</button>
                                            <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                                                <span class="processing-specification">雙面</span>
                                                <div class="ml-1 badge badge-light" style="font-size: 1.05rem;">
                                                    <span class="processing-price">$4,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="client_memo">備註</label>
                                    <textarea class="form-control" id="client_memo" name="Memo" rows="5" placeholder="請輸入備註 ..."></textarea>
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
    function addstandard() {
        let process_standard=$("#process_standard").val();
        let data=process_standard.split(',');


        addstandard

        console.log(data);
        $('input[name="standard"]').val(process_standard);
        //standard=123456;
    }
    $(function(){
        // 新增規格按鈕
        $('button[control="add-specification"]').click(function(){
            // 規格
            let $specification = $('input[data-type="specification"]').val();
            // console.log($specification);
            // 價格
            let $price = $('input[data-type="price"]').val();
            // console.log($price);
            // 被新增的項目結構
            let $item = $(`<div class="processing-specification-item alert alert-info d-inline-flex mb-0 p-0">
                <button type="button" class="close text-white pl-2" data-dismiss="alert"
                    aria-hidden="true" style="opacity: 1;">&times;</button>
                <div class="pl-2 pr-1 py-1" style="font-size: 1.05rem;">
                    <span class="processing-specification">${$specification}</span>
                    <div class="ml-1 badge badge-light" style="font-size: 1.05rem;">
                        <span class="processing-price">$${$price}</span>
                    </div>
                </div>
            </div>`);
            $("#processing-specification-list").append($item);
        });
        // 送出按鈕
        $('button[type="submit"]').click(function(){
            let $list = $("#processing-specification-list").find('.processing-specification-item');
            let arrList = [];
            $list.each(function(){
                let $specification = $(this).find('.processing-specification').text();
                let $price = $(this).find('.processing-price').text();
                let $item = {
                    'specification': $specification,
                    'price': $price
                };
                arrList.push($item);
            });
            console.log(arrList);
            return false;
        });
    });
</script>
