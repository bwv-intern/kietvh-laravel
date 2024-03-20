<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return "index";
    }

    public function getEdit($id){
        return "getEdit";
    }

    public function postEdit(Request $request){
        return "postEdit";
    }

    public function getAdd(){
        return "getAdd";
    }

    public function add(Request $request){
        return "add";
    }

    public function deleteByID($id){
        return "deleteByID";
    }
}
