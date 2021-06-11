<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class total_archive extends Model
{
    use HasFactory;

    public function totla(){

       

        

        $total = total_archive::orderBy('created_at', 'desc')->first();
        return $total;                                   
    }
}
