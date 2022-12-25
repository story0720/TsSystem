@extends('Layout.index')
@section('title', '編輯種類《鐵祥企業》')
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
                        <h1 class="m-0">編輯種類</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ Route('category.index') }}">廠商種類</a></li>
                            <li class="breadcrumb-item active">編輯種類</li>
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
                    <form action="{{ Route('category.update', $edit['ca_id']) }}" method="post">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="client_category">種類名稱</label>
                                    <input type="text" class="form-control" name="Name" value="{{ $edit['ca_Name'] }}"
                                        id="client_category" placeholder="請輸入廠商種類">
                                </div>
                                <div class="form-group col">
                                    <label for="client_category_memo">備註</label>
                                    <textarea class="form-control" name="Memo" id="client_category_memo" rows="5" placeholder="請輸入備註 ...">{{ $edit['ca_Memo'] }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">送出</button>
                        </div>
                        <!-- /.card-footer -->
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
