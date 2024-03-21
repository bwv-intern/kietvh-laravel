<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ExTransactionController extends Controller
{
    public function store(Request $request){
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
        }
        catch(\Exception $ex){
            $request->session()->flash('errors', $ex);

            // roolback transaction when have errors
            DB::rollback();
        }

    }
}
