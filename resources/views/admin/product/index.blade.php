@extends('admin.main')

@section('title')
    <title>Admin | Danh Mục</title>
@endsection

@section('content')

    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="text-center">Sản phẩm</h5>
            <p class="card-text text-center">
                Admin - Sản phẩm
            </p>
        </div>

        <div class="card-content mx-5">
            <button class="btn btn-success my-2" onclick="add()"> Thêm mới</button>

            @if (session('success'))
                <div class="alert alert-success my-1">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Tên loại</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Mô tả</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price,2) }}</td>
                            <td>{{ Str::of($item->description)->limit(20)}}</td>
                            <td>
                                <button class="btn btn-warning" onclick="editById({{$item -> id}})">Edit</button>
                                <button class="btn btn-danger" onclick="deleteById({{$item -> id}})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{ $products->links() }}
@endsection

<script>

    function editById(id) {
        window.location.href = "/admin/product/edit/" + id;
    }

    function deleteById(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
            window.location.href = "/admin/product/delete/" + id;
        }
    }

    function add() {
        window.location.href = "/admin/product/add";
    }
</script>
