@extends('Layout.index')
@section('title', '訂單管理《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">訂單管理</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">訂單管理</li>
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
                <div class="card-header">
                    <a href="{{ Route('order.create') }}" class="btn btn-primary">新增訂單</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center table-valign-middle" id="listtable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center text-nowrap bg-info">No.</th>
                                <th scope="col" class="text-nowrap bg-info">廠商名稱</th>
                                <th scope="col" class="text-nowrap bg-info">加工編號</th>
                                <th scope="col" class="text-nowrap bg-info">加工方法&規格</th>
                                <th scope="col" class="text-nowrap bg-info">單價</th>
                                <th scope="col" class="text-nowrap bg-info">應交數量</th>
                                <th scope="col" class="text-nowrap bg-info">應交日期</th>
                                <th scope="col" class="text-nowrap bg-info">發料狀態(發料日期&發料數量)</th>
                                <th scope="col" class="text-nowrap bg-olive">交貨狀態(實交日期&實交數量)</th>
                                <th scope="col" class="text-nowrap bg-olive">總額</th>
                                <th scope="col" class="text-center text-nowrap bg-olive">狀態</th>
                                <th scope="col" class="text-center text-nowrap bg-info">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item => $key)
                            <tr>
                                <td>{{ $item + 1 }}</td>
                                <td>{{ $key->Factorymannagement->mn_Name }}</td>
                                <td>{{ $key->serialnumber }}</td>
                                <td class="text-left">
                                    {{ $key->Processing->pr_categoryname }}<br>
                                    <span class="mr-1 badge badge-dark">規格1(還沒做)</span>
                                    <span class="mr-1 badge badge-dark">規格2(還沒做)</span>
                                    <br>
                                    <span class="badge badge-info">117孔</span>
                                    <span class="badge badge-secondary">無凹槽</span>
                                </td>
                                <td>{{ $key->unitprice }}</td>
                                <td>{{ $key->estimatedquantity }}</td>
                                <td>{{ $key->shipdate }}</td>
                                <td class="text-left" data-type="發料狀態(發料日期&發料數量)">
                                    <span class="badge badge-dark mr-1">發料日期</span>2023.03.10<br>
                                    <span class="badge badge-secondary mr-1">發料數量</span>10<br>
                                    <span class="badge badge-danger">未發料</span>
                                </td>
                                <td class="text-left" data-type="交貨狀態(實交日期&實交數量)">
                                    <span class="badge badge-dark mr-1">實交日期</span>2023.04.10<br>
                                    <span class="badge badge-secondary mr-1">實交數量</span>10<br>
                                    <span class="badge badge-danger">未交貨</span>
                                </td>
                                <td data-type="總額">{{ $key->count }}</td>
                                <td data-type="狀態">
                                    <a class="mb-1 btn btn-warning btn-sm text-nowrap" href="#">
                                        <i class="fa fa-exclamation-circle mr-1">
                                        </i>
                                        未完工
                                    </a><br>
                                    <span class="badge badge-success">已完工</span>
                                </td>
                                <td>
                                    <a class="mb-1 btn btn-info btn-sm text-nowrap" href="{{Route('order.edit',$key->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        編輯
                                    </a>
                                    <form action="{{ Route('order.destroy', $key->id) }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="mb-1 btn btn-danger btn-sm text-nowrap">
                                            <i class="fas fa-trash">
                                            </i>
                                            刪除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('script')
<script src="{{ asset('js/Order/index.js') }}"></script>
@endsection