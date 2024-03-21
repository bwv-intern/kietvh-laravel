<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try{
            $categoryId = $row[3];

            $category = Category::find($categoryId);

            if (!$category) {
                return null;
            }

            return new Product([
                'name' => $row[1],
                'price' => $row[2],
                'id_category' => $categoryId,
                'quantity' => $row[5],
                'description' => $row[4],
                'created_at' => Carbon::parse($row[6]) ?? Carbon::now(),
                'updated_at' => Carbon::parse($row[7]) ?? Carbon::now(),
            ]);
        }
        catch(\Exception $e){
            return null;
        }

    }
}
