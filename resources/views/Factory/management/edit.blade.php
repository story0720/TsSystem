@extends('Layout.index')
@section('title', '編輯廠商《鐵祥企業》')
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
                        <h1 class="m-0">編輯廠商</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ Route('management.index') }}">廠商列表</a></li>
                            <li class="breadcrumb-item active">編輯廠商</li>
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
                    <form method="post" action="{{ Route('management.update', $edit['mn_id']) }}">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col">
                                    <label><span class="text-danger">*</span>廠商種類</label>
                                    <select class="form-control" id="client_category" name="category">
                                        <option>請選擇種類</option>
                                        @foreach ($category as $item)
                                            {{-- @if ($item->ca_id == $edit['ca_id'])
                                                <option value="{{ $item->ca_id }}" selected>{{ $item->ca_Name }}</option>
                                            @endif --}}
                                            <option value="{{ $item->ca_id }}" {{$item->ca_id == $edit['ca_id']?"selected":""}} >{{ $item->ca_Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="client_name"><span class="text-danger">*</span>廠商名稱</label>
                                    <input type="text" class="form-control" name="name" value="{{ $edit['mn_Name'] }}"
                                        id="client_name" placeholder="請輸入廠商名稱">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="client_contact_person"><span class="text-danger">*</span>聯絡人</label>
                                    <input type="text" class="form-control" name="contact"
                                        value="{{ $edit['mn_Contact'] }}" id="client_contact_person" placeholder="請輸入聯絡人">
                                </div>
                                <div class="form-group col">
                                    <label for="client_primary_phone"><span class="text-danger">*</span>主要電話</label>
                                    <input type="text" class="form-control" name="tel1" value="{{ $edit['mn_Tel1'] }}"
                                        id="client_primary_phone" placeholder="請輸入主要電話">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="client_secondary_phone">次要電話</label>
                                    <input type="text" class="form-control" name="tel2"
                                        value="{{ $edit['mn_Tel2'] }}" id="client_secondary_phone" placeholder="請輸入次要電話">
                                </div>
                                <div class="form-group col">
                                    <label for="client_fax">傳真</label>
                                    <input type="text" class="form-control" name="fax" value="{{ $edit['mn_Fax'] }}"
                                        id="client_fax" placeholder="請輸入傳真">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="client_address"><span class="text-danger">*</span>地址</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ $edit['mn_Address'] }}" id="client_address" placeholder="請輸入地址">
                                </div>
                                <div class="form-group col">
                                    <label for="client_memo">備註</label>
                                    <textarea class="form-control" name="memo" id="client_memo" rows="5" placeholder="請輸入備註 ...">{{ $edit['mn_Memo'] }}</textarea>
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
