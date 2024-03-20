<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return "index";
    }


    public function add(Request $request)
    {
        return "add";
    }

    public function getAdd()
    {
        return "getAdd";
    }

    public function getEdit($id)
    {
        return "getEdit";
    }

    public function edit(ProductRequest $request)
    {
        return "edit";
    }
    public function delete($id)
    {
        return "delete";
    }
}
