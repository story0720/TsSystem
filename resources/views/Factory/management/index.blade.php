@extends('Layout.index')
@section('title', '廠商列表《鐵祥企業》')
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
                    <h1 class="m-0">廠商列表</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">廠商列表</li>
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
                <div class="card-header text-left">
                    <a href="{{ Route('management.create') }}" class="btn btn-success">新增廠商</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" id="listtable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">種類</th>
                                <th scope="col">廠商名稱</th>
                                <th scope="col">聯絡人</th>
                                <th scope="col">主要電話</th>
                                <th scope="col" class="text-center">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $item->mn_id }}</td>
                                <td>{{ $item->category->ca_Name }}</td>
                                <td>{{ $item->mn_Name }}</td>
                                <td>{{ $item->mn_Contact }}</td>
                                <td>{{ $item->mn_Tel1 }}</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-lg{{ $item->mn_id }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        檢視
                                    </button>
                                    <div class="modal fade" id="modal-lg{{ $item->mn_id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">廠商詳細資料</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 10rem;">種類</th>
                                                                <td class="text-left">{{ $item->category->ca_Name }}
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <th style="width: 10rem;">公司名稱</th>
                                                                <td class="text-left">{{ $item->mn_Name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 10rem;">聯絡人</th>
                                                                <td class="text-left">{{ $item->mn_Contact }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 10rem;">主要電話</th>
                                                                <td class="text-left">{{ $item->mn_Tel1 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 10rem;">次要電話</th>
                                                                <td class="text-left">{{ $item->mn_Tel2 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 10rem;">傳真</th>
                                                                <td class="text-left">{{ $item->mn_Fax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 10rem;">地址</th>
                                                                <td class="text-left">{{ $item->mn_Address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th style="width: 10rem;">備註</th>
                                                                <td class="text-left">{{ $item->mn_Memo }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer text-right">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <a class="btn btn-info btn-sm" href="{{ Route('management.edit', $item->mn_id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        編輯
                                    </a>
                                    <button type="submit" id="sub-btn" class="btn btn-danger btn-sm" data-id="{{ $item->mn_id }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        刪除
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
<script src="{{ asset('js/Factory/management/index.js') }}"></script>
@endsection