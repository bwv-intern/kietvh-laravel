@extends('admin.main')

@section('title')
    <title>Admin | Thêm Sản Phẩm</title>
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
            <h5 class="text-center">Thêm Sản Phẩm</h5>
            <p class="card-text text-center">
                Admin - Thêm Sản Phẩm
            </p>

            <div class="row">
                <div class="col-sm">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Sản Phẩm Mới</h3>
                        </div>
                        <form action="/admin/product/add" id="productForm" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productName">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" id="productName" name="productName"
                                        placeholder="Tên Sản Phẩm">
                                    <span id="productNameError" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label>Loại</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $key)
                                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Giá Sản Phẩm</label>
                                    <input type="number" class="form-control" id="productPrice" name="productPrice"
                                        placeholder="Giá Sản Phẩm">
                                    <span id="productPriceError" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="productQuantity">Số lượng</label>
                                    <input type="number" class="form-control" id="productQuantity" name="productQuantity"
                                        placeholder="Giá Sản Phẩm">
                                    <span id="productQuantityError" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Mô Tả Sản Phẩm</label>
                                    <textarea class="form-control" id="productDescription" name="productDescription" rows="3"
                                        placeholder="Mô Tả Sản Phẩm"></textarea>
                                    <span id="productDescriptionError" class="text-danger"></span>
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
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var productName = document.getElementById('productName').value.trim();
            var productPrice = document.getElementById('productPrice').value.trim();
            var productDescription = document.getElementById('productDescription').value.trim();

            var productNameError = document.getElementById('productNameError');
            var productPriceError = document.getElementById('productPriceError');
            var productDescriptionError = document.getElementById('productDescriptionError');


            // Kiểm tra kiểu dữ liệu và các điều kiện khác
            if (productName === '') {
                productNameError.textContent = 'Vui lòng nhập tên sản phẩm.';
                return false;
            }
            if (productName.length > 255) {
                productNameError.textContent = 'Tên sản phẩm không được vượt quá 255 ký tự.';
                return false;
            }
            if (isNaN(productPrice)) {
                productPriceError.textContent = 'Vui lòng nhập giá sản phẩm hợp lệ.';
                return false;
            }
            if (productPrice <= 0) {
                productPriceError.textContent = 'Vui lòng nhập giá sản phẩm lớn hơn 0.';
                return false;
            }
            if (productDescription === '') {
                productDescriptionError.textContent = 'Vui lòng nhập mô tả sản phẩm.';
                return false;
            }

            if (productDescription.length > 255) {
                productDescriptionError.textContent = 'Mô tả sản phẩm không được vượt quá 255 ký tự.';
                return false;
            }


            // Gửi form nếu đã kiểm tra xong
            this.submit();
        });
    </script>
@endsection
