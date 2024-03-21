<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoriesImport;
use App\Exports\CategoryExport;
class CategoryController extends Controller
{
    public function index(){

        $categories = Category::simplePaginate(5);
        return view('admin.category.index',compact('categories'));

    }

    public function getEdit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }

    public function postEdit(CategoryRequest $request){

        DB::beginTransaction();
        try{
            $idCategory = $request -> idCategory;
            $nameCategory =  $request -> nameCategory;

            $category = Category::findOrFail($idCategory);

            $category->name = $nameCategory;
            $category->save();

            DB::commit();

            return redirect()->route('category.gedit', ['id' => $idCategory])->with('success', 'Category đã được cập nhật thành công');
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật Danh mục');
        }

    }

    public function getAdd(){
        return view('admin.category.add');
    }

    public function add(Request $request){

        DB::beginTransaction();
        try{

            $nameCategory = $request ->nameCategory;
            $category = new Category();
            $category -> name = $nameCategory;
            $category -> save();
            DB::commit();

            return redirect()->route('category.index')->with('success', 'Danh mục đã được thêm thành công');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm Danh mục');
        }
    }

    public function deleteByID($id){
        DB::beginTransaction();
        try {

            $category = Category::findOrFail($id);

            $category->delete();

            DB::commit();

            return redirect()->route('category.index')->with('success', 'Danh mục đã được xóa thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('category.index')->with('errors', 'Đã xảy ra lỗi khi xóa Danh mục');
        }
    }

    public function import(Request $request){
        Excel::import(new CategoriesImport, $request->csv_file);
        return redirect()->route('category.index')->with('success', 'Danh mục đã được nhập thành công');
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'categories.csv');
    }
}
