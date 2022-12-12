<?php

namespace App\Imports;

use App\Property;
use Maatwebsite\Excel\Concerns\ToModel;

class PropertiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Property([
            //
        ]);
    }
}
