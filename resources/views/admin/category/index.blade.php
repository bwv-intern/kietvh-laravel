@extends('admin.main')

@section('title')
    <title>Admin | Danh Mục</title>
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
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger my-1">
                {{ $error }}
            </div>
        @endforeach
    @endif --}}
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="text-center">Danh Mục</h5>
            <p class="card-text text-center">
                Admin - Danh Mục
            </p>
        </div>

        <div class="card-content mx-5">
            <div class="d-flex justify-content-between">
                <button class="btn btn-success my-2" onclick="add()"> Thêm mới </button>
                <div class="f-flex">
                    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#uploadModal">
                        <i class="fa fa-file-import"></i>
                    </button>
                    <button type="button" class="btn btn-secondary my-2" onclick="exportCSV()">
                        <i class="fa fa-download"></i>
                    </button>
                </div>
            </div>

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
                                    <button class="btn btn-danger" onclick="deleteById({{ $category->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $categories->links() }}


    <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload File CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Choose CSV File</label>
                            <input class="form-control" type="file" id="formFile" name="csv_file">
                        </div>
                        <div class="d-flex justify-content-end"><button type="submit"
                                class="btn btn-primary">Upload</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

    function exportCSV() {
        window.location.href = "/admin/category/export";
    }
</script>
