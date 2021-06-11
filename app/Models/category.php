<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function StoreCategory($request)
    {
        $data = category::create([
            'name' => $request->category,
        ]);
        return $data;
    }

    public function getCategories()
    {
        $categories = category::with('products')->paginate(10);
        return $categories;
    }

    public function dropListCategories()
    {
        $categories = category::all();
        return $categories;
    }
    
    public function getCategoryId($id)
    {
        $category = category::find($id);
        return $category;
    }

    public function updateCategory($request, $id)
    {
        $category = category::find($id);
        $category->name = $request->category;
        $category->save();
        if ($category->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deleteCategory($id)
    {
        $data = product_category::where('category_id', $id)->pluck('category_id')->first();
        if($data){
            return "cant delete";
        }else{
            $category = category::find($id)->delete();
            return $category ;
        }
    }

    public function products(){
        return $this->belongsToMany(product::class , 'product_categories' );
    }

   


}
