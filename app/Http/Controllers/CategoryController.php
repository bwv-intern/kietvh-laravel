<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::simplePaginate(1);
        return view('admin.category.index',compact('categories'));

    }

    public function getEdit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }

    public function postEdit(CategoryRequest $request){
        $idCategory = $request -> idCategory;
        $nameCategory =  $request -> nameCategory;

        $category = Category::findOrFail($idCategory);

        $category->name = $nameCategory;
        $category->save();

        return redirect()->route('category.gedit', ['id' => $idCategory])->with('success', 'Category đã được cập nhật thành công');

    }

    public function getAdd(){
        return view('admin.category.add');
    }

    public function add(Request $request){
        $nameCategory = $request ->nameCategory;
        $category = new Category();
        $category -> name = $nameCategory;
        $category -> save();

        return redirect()->route('category.gedit', ['id' => $category -> id])->with('success', 'Danh mục đã được thêm thành công');
    }

    public function deleteByID($id){
        try {

            $category = Category::findOrFail($id);

            $category->delete();

            return redirect()->route('category.index')->with('success', 'Danh mục đã được xóa thành công');
        } catch (\Exception $e) {

            return redirect()->route('category.index')->with('error', 'Đã xảy ra lỗi khi xóa Danh mục');
        }
    }
}
