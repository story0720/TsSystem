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
                                    <th class="bg-info disabled">#</th>
                                    <th class="bg-info disabled">廠商名稱</th>
                                    <th class="bg-info disabled">加工編號</th>
                                    <th class="bg-info disabled">加工成品(種類&規格)</th>
                                    <th class="bg-info disabled">單價</th>
                                    <th class="bg-info disabled">應交數量</th>
                                    <th class="bg-info disabled">應出貨日期</th>
                                    <th class="bg-info disabled">發料狀態</th>
                                    <th class="bg-olive disabled">交貨日期</th>
                                    <th class="bg-olive disabled">實交數量</th>
                                    <th class="bg-olive disabled">總額</th>
                                    <th class="bg-olive disabled" style="width: 4rem;">狀態</th>
                                    <th class="bg-info disabled" style="width: 6rem;">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item => $key)
                                    <tr>
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $key->Factorymannagement->mn_Name }}</td>
                                        <td>{{ $key->serialnumber }}</td>
                                        <td class="text-left">
                                            {{ $key->Processing->pr_categoryname }}<span
                                                class="ml-1 badge badge-info">加工規格1</span>
                                        </td>
                                        <td>{{ $key->unitprice }}</td>
                                        <td>{{ $key->estimatedquantity }}</td>
                                        <td>{{ $key->shipdate }}</td>
                                        <td>
                                            <span class="badge badge-danger">未發料</span>
                                        </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td>{{ $key->count }}</td>
                                        <td>
                                            <sapn class="badge badge-danger">未完工</sapn>
                                        </td>
                                        <td>
                                            <a class="mb-1 btn btn-info btn-sm" href="{{Route('order.edit',$key->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                編輯
                                            </a>
                                            <form action="{{ Route('order.destroy', $key->id) }}" method="post"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="mb-1 btn btn-danger btn-sm">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    刪除
                                                </button>
                                            </form>
                                            <button class="mb-1 btn btn-warning btn-sm">
                                                <i class="fas fa-check">
                                                </i>
                                                完工
                                            </button>
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