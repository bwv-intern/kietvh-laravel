@extends('admin.main')

@section('title')
    <title>Admin | Sửa Danh Mục</title>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa danh mục </h3>
                        </div>
                        <form action = "/admin/category/edit/" id ="categoryForm" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="idCategory" name="idCategory"
                                        placeholder="ID danh mục" value="{{ $category->id }}" <label for="nameCategory">Tên
                                    danh mục</label>
                                    <input type="text" class="form-control" id="nameCategory" name="nameCategory"
                                        placeholder="Tên danh mục" value="{{ $category->name }}">
                                    <span id="nameCategoryError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submitButton">
                                    <span id="buttonText">Sửa</span>
                                    <span id="loadingIcon" class="spinner-border d-none" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('categoryForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var nameCategory = document.getElementById('nameCategory').value.trim();
            var nameCategoryError = document.getElementById('nameCategoryError');
            var submitButton = document.getElementById('submitButton');

            if (nameCategory === '') {
                nameCategoryError.textContent = 'Vui lòng nhập tên danh mục.';
                return false;
            }

            submitButton.disabled = true;

            showOverlay(true);

            this.submit();
        });
    </script>
@endsection
