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

            <div class="row">
                <div class="col-sm">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Thêm danh mục mới</h3>
                        </div>

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
                        <form action = "/admin/category/add" id ="categoryForm" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nameCategory">Tên danh mục</label>
                                    <input type="text" class="form-control" id="nameCategory" name="nameCategory" placeholder="Tên danh mục">
                                    <span id="nameCategoryError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
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

            if (nameCategory === '') {
                nameCategoryError.textContent = 'Vui lòng nhập tên danh mục.';
                return false;
            }

            this.submit();
        });
    </script>
@endsection


