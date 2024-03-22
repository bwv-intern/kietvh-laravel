@extends('admin.main')

@section('title')
    <title>Admin | Sản phẩm</title>
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
            <h5 class="text-center">Sản phẩm</h5>
            <p class="card-text text-center">
                Admin - Sản phẩm
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
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Tên loại</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ Str::of($item->description)->limit(20) }}</td>
                                <td>
                                    <button class="btn btn-warning" onclick="editById({{ $item->id }})">Edit</button>
                                    <button class="btn btn-danger"
                                        onclick="deleteById({{ $item->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{ $products->links() }}

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
                    <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
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

    function exportCSV() {
        window.location.href = "/admin/product/export";
    }
</script>
