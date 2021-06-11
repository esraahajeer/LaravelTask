<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'description' ,
        'quantity',
        'price',
        'image',
        'user_id'
    ];

    public function getProduct()
    {

        $Product = product::orderBy('updated_at', 'DESC')->with(['product_category'])->paginate(10);
   
             
       

        return $Product;
    }

    public function StoreProduct($request, $filePath)
    {
        $data = new product;
        $image = $filePath ? $filePath :false;
        $data->image =  $filePath ? '/storage/' . $filePath :false;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->quantity = $request->quantity ?? '1';
        $data->user_id = Auth::user()->id;
        $data->price = $request->price ?? '1';
        $data->save();
        $Categories = $request->category;
        foreach ($Categories as $category) {
            $data2 = new product_category;
            $data2->product_id  = $data->id;
            $data2->category_id = $category;
            $data2->save();
        }
        return $data;
    }

    public function getProductId($id)
    {
        $product = product::where('id', $id)->with(['category'])
        ->get();
        return $product;
    }

    public function UpdateProduct($request, $filePath, $id)
    {
        $image = $filePath ? $filePath :false;
        $data = product::find($id);
        $data->image =  $filePath ? '/storage/' . $filePath :false;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->quantity = $request->quantity ?? '1';
        $data->user_id = Auth::user()->id;
        $data->price = $request->price ?? '1';
        $data->save();
        $Categories = $request->category;
        $data2 = product_category::where('product_id', $data->id)->delete();
        foreach ($Categories as $category) {
            $data2 = new product_category;
            $data2->product_id = $data->id;
            $data2->category_id = $category;
            $data2->save();
        }
        return $data;
    }

    public function deleteProduct($id)
    {
        $data = product::find($id)->delete();
        return $data;
    }

    public function RemoveProduct($id)
    {
        $data = product::where('id', $id)->pluck('quantity');
        if ($data[0] == 1) {
            $pro = product::find($id)->delete();
            return 1;
        }
        return 0 ;
    }

    public function getInfo($id)
    {
        $data = product::where('id', $id)->with(['user' ,'product_category.category' ])->get();
        return $data;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsToMany(category::class, 'product_categories');
    }

    public function product_category()
    {
        return $this->hasMany(product_category::class);
    }
}
