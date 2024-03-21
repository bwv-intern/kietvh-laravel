<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try{
            $name = $row[1];

            $createdAt = Carbon::parse($row[2]);

            $updatedAt = Carbon::parse($row[3]);

            return new Category([
                "name" => $name,
                "created_at" => $createdAt,
                "updated_at" => $updatedAt
            ]);
        }
        catch(\Exception $e){
            return null;
        }
    }
}
