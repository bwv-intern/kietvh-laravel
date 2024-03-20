<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::simplePaginate(5);
        return view('admin.product.index', compact('products'));
    }


    public function add(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('productName');
        $product->price = $request->input('productPrice');
        $product->id_category = $request->category_id;
        $product->quantity = $request->productQuantity;
        $product->description = $request->input('productDescription');
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function getAdd()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    public function getEdit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function edit(ProductRequest $request)
    {
        $productId = $request->input('productID');
        $productName = $request->input('productName');
        $categoryId = $request->input('category_id');
        $productPrice = $request->input('productPrice');
        $productQuantity = $request->input('productQuantity');
        $productDescription = $request->input('productDescription');

        $product = Product::findOrFail($productId);

        $product->name = $productName;
        $product->id_category = $categoryId;
        $product->price = $productPrice;
        $product->quantity = $productQuantity;
        $product->description = $productDescription;

        $product->save();

        return redirect()->route('admin.product.gedit', ['id' => $productId])->with('success', 'sản phẩm đã được cập nhật thành công');
    }
    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm để xóa.');
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }
}
