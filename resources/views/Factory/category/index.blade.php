@extends('Layout.index')
@section('title', '廠商種類《鐵祥企業》')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">廠商種類</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">廠商種類</li>
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
                    <a href="{{ Route('category.create') }}" class="btn btn-success">新增種類</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" id="listtable">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col">種類</th>
                                <th scope="col">備註</th>
                                <th scope="col" class="text-center">功能</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td class="text-center">{{ $item->ca_id }}</td>
                                <td>{{ $item->ca_Name }}</td>
                                <td>{{ $item->ca_Memo }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info btn-sm" href="{{ Route('category.edit', $item->ca_id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        編輯
                                    </a>
                                    <button type="submit" id="sub-btn" class="btn btn-danger btn-sm" data-id="{{ $item->ca_id }}">
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
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
@section('script')
<script src="{{ asset('js/Factory/category/index.js') }}"></script>
@endsection