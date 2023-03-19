@extends('Layout.index')
@section('title', '加工列表《鐵祥企業》')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">加工列表</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">加工列表</li>
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
                        <a href="{{ Route('processing.create') }}" class="btn btn-success">新增加工</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 2rem;">#</th>
                                    <th>加工方法</th>
                                    <th class="p-0">
                                        <div class="row m-0 w-100">
                                            <div class="col p-3">加工規格</div>
                                            <div class="col p-3 border-left">單價</div>
                                        </div>
                                    </th>
                                    <th>備註</th>
                                    <th class="text-center" style="width: 10rem;">功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td>{{ $item->pr_categoryname }}</td>
                                        <td class="p-0">
                                            @foreach ($item->Prtags as $key)
                                                <div class="row m-0 w-100">
                                                    <div class="col p-3 border-bottom">{{ $key->pr_standard }}</div>
                                                    <div class="col p-3 border-bottom border-left">${{ $key->pr_price }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>{{ $item->pr_memo }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" href="{{ Route('processing.edit', $item->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                編輯
                                            </a>
                                            <form action="{{ Route('processing.delete', $item->id) }}" method="post"
                                                class="d-inline">
                                                @method('Delete')
                                                @csrf
                                                <button type="button" id="sub-btn" data-id="{{ $item->id }}"
                                                    class="btn btn-danger btn-sm">
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
    <script src="{{ asset('js/Processing/index.js') }}"></script>
@endsection
