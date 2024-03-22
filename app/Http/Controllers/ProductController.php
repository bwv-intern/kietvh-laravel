<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Barryvdh\Debugbar\Facade as Debugbar;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::simplePaginate(5);
        return view('admin.product.index', compact('products'));
    }


    public function add(ProductRequest $request)
    {
        DB::beginTransaction();
        try{
            $idCategory = $request->category_id;
            if(!Category::find($idCategory)){
                return redirect()->route('product.index')->with('errors', 'Thêm sản phẩm thất bại! Không tìm thấy danh mục');
            }
            $product = new Product();
            $product->name = $request->input('productName');
            $product->price = $request->input('productPrice');
            $product->id_category = $idCategory;
            $product->quantity = $request->productQuantity;
            $product->description = $request->input('productDescription');
            $product->save();

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('product.index')->with('errors', 'Thêm sản phẩm thất bại!');
        }
    }

    public function getAdd()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    public function getEdit($id)
    {
        $product = Product::find($id);
        if(!$product){
            Debugbar::error("Product not found");
            return redirect()->route('product.index')->with('errors', 'Không tìm thấy sản phẩm');
        }
        Debugbar::info( $product );
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function edit(ProductRequest $request)
    {

        DB::beginTransaction();
        try{
            $productId = $request->input('productID');
            $productName = $request->input('productName');
            $categoryId = $request->input('category_id');
            $productPrice = $request->input('productPrice');
            $productQuantity = $request->input('productQuantity');
            $productDescription = $request->input('productDescription');

            $product = Product::findOrFail($productId);

            if(!$product){
                return redirect()->route('product.index')->with('errors', 'Không tìm thấy sản phẩm');
            }
            if(!Category::find($categoryId)){
                return redirect()->route('product.index')->with('errors', 'Không tìm thấy danh mục');
            }

            $product->name = $productName;
            $product->id_category = $categoryId;
            $product->price = $productPrice;
            $product->quantity = $productQuantity;
            $product->description = $productDescription;

            $product->save();

            DB::commit();

            return redirect()->route('product.gedit', ['id' => $productId])->with('success', 'sản phẩm đã được cập nhật thành công');

        }
        catch(\Exeception $e){
            return redirect()->route('product.index')->with('errors', 'Cập nhật sản phẩm thất bại!');
        }
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try{
            $product = Product::find($id);

            if (!$product) {
                return redirect()->back()->with('error', 'Không tìm thấy sản phẩm để xóa.');
            }

            $product->delete();

            DB::commit();

            return redirect()->route('product.index')->with('success', 'Sản phẩm đã được xóa thành công.');
        }
        catch(\Exception $e){
            DB::rollback();
        }
    }

    public function export()
    {
        return Excel::download(new ProductExport, 'products.csv');
    }

    public function import(Request $request){
        Excel::import(new ProductImport, $request->csv_file);
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được nhập thành công');
    }

}
