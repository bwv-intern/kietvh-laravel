@extends('admin.main')

@section('title')
    <title>Admin | Danh Mục</title>
@endsection

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="text-center">Danh Mục</h5>
            <p class="card-text text-center">
                Admin - Danh Mục
            </p>
        </div>

        <div class="card-content mx-5">
            <button class="btn btn-success my-2" onclick="add()"> Thêm mới </button>

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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button class="btn btn-warning" onclick="editById({{ $category->id }})">Edit</button>
                                    <button class="btn btn-danger"
                                        onclick="deleteById({{ $category->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $categories->links() }}
@endsection

<script>
    function editById(id) {
        window.location.href = "/admin/category/edit/" + id;
    }

    function deleteById(id) {
        if (confirm("Bạn có chắc chắn muốn xóa mục này không?")) {
            window.location.href = "/admin/category/delete/" + id;
        }
    }

    function add() {
        window.location.href = "/admin/category/add";
    }
</script>
