@extends('admin.main')

@section('title')
    <title>Admin | Thêm Danh Mục</title>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success my-1">
            {{ session('success') }}
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger my-1">
            {{ session('errors') }}
        </div>
    @endif

    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="text-center">Danh Mục</h5>
            <p class="card-text text-center">
                Admin - Danh Mục
            </p>
            <div class="row">
                <div class="col-sm">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Thêm danh mục mới</h3>
                        </div>
                        <div class="card-body">
                            Bạn có muốn xác nhận những gì đã submit không ?
                            <button> Xác nhận </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
