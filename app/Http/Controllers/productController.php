<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class productController extends Controller
{
    public function ProductsIndex()
    {
        $Model = new product;
        $Data = $Model->getProduct();
        if ($Data) {
            return view('ProductsIndex', ['products' =>$Data]);
        } else {
            return redirect()->route('ProductsIndex')->with(Session::flash('fail', 'Failed returned data please Try Again'));
        }
    }

    public function Product()
    {
        $Model = new category;
        $Data = $Model->dropListCategories();
        return view('createProduct', ['category' =>$Data]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required'
            ]);

            $filePath = $request->file ? $request->file :false;

            if (!$filePath == null) {

                $name = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');  

            }
                 
       
        $Model = new product;
        $StoreData = $Model->StoreProduct($request, $filePath);
        if ($StoreData) {
            return redirect('ProductsIndex')->with('saved', 'Successfully Added Product');
        } else {
            return redirect('ProductsIndex')->with('fail', 'Coudnt Added The Product please Try Again');
        }
    }

    public function ProductById($id)
    {
        $Model = new product;
        $categoryModel = new category;
        $Data = $Model->getProductId($id);
        $category = $categoryModel->dropListCategories();

        if ($Data) {
            return view('ProductEdit', ['product' =>$Data , 'category' =>$category ]);
        } else {
            return redirect('ProductsIndex')->with('fail', 'Failed returned data please Try Again');
        }
    }

    public function editProduct(Request $request , $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required'

            ]);

            $filePath = $request->file ? $request->file :false;

            if (!$filePath == null) {

                $name = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $name, 'public');  

            }
               
        $Model = new product;
        $StoreData = $Model->UpdateProduct($request, $filePath , $id);
        if ($StoreData) {
            return redirect('ProductsIndex')->with('saved', 'Successfully Updated Product');
        } else {
            return redirect('ProductsIndex')->with('fail', 'Coudnt Updated The Product please Try Again');
        }
    }

    public function ProductDelete($id)
    {
        $Model = new product;
        $Data = $Model->deleteProduct($id);
        if ($Data) {
            return redirect('ProductsIndex')->with('saved', 'Successfully Deleted Product');
        } else{
            return redirect('ProductsIndex')->with('fail','Failed Delete Product Please Try Again');
        }
    }

    public function RemoveQuantity($id)
    {
        $Model = new product;
        $Data = $Model->RemoveProduct($id);
      
        if($Data == 1){
            return redirect('ProductsIndex')->with('saved', 'Successfully Removed Product');
        }else{
            return redirect('ProductsIndex')->with('fail','You Can Remove Only Quantity One');
        }
    }

    public function showInfo($id)
    {
        $Model = new product;
        $Data = $Model->getInfo($id);
        if($Data){
            return view('ShowInfo', ['info' =>$Data]);
        }else{
            return redirect('ProductsIndex')->with('fail','Failed returned data please Try Again');
        }

       

    }
}
