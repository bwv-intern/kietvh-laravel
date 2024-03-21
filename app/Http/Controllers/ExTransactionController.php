<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

class ExTransactionController extends Controller
{
    public function store(ProductRequest $request){
        // start transaction
        DB::beginTransaction();

        try{
            // Create new Product
            $product = new Product();
            $product -> name = "Product 5";
            $product -> price = 50000;
            $product -> id_category = 1;
            $product -> description = "Description for Product 5";
            $product -> quantity = 50;
            $product -> save();

            // Commit transaction
            DB::commit();
            return "Insert element to database transaction successfully";
        }
        catch(\Exception $ex){
            // roolback transaction when have errors
            DB::rollback();
            return "Error occurred";
        }

    }
}
