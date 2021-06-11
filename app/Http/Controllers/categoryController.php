<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    public function CategoriesIndex()
    {
        $Model = new category;
        $Data = $Model->getCategories();
        if ($Data) {
            return view('CategoriesIndex' , ['Categories' =>$Data]);
        } else {
            return redirect('CategoriesIndex')->with('fail','Failed returned data please Try Again');

        }
    }

    public function Category()
    {
        return view('createCategory');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);
        
        $Model = new category;
        $StoreData = $Model->StoreCategory($request);
        if ($StoreData) {
            return redirect('CategoriesIndex')->with('saved', 'Successfully Added Category');
        } else {
            return redirect('CategoriesIndex')->with('fail','Coudnt Added The Category please Try Again');
        }
    }

    public function CategoryById($id)
    {
        $Model = new category;
        $Data = $Model->getCategoryId($id);
        if ($Data) {
            return view('CategoryEdit' , ['Category' =>$Data]);
        } else{
            return redirect('CategoriesIndex')->with('fail','Failed returned data please Try Again');
        }
    }

    public function editCategory(Request $request , $id)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $Model = new category;
        $Data = $Model->updateCategory($request , $id);
        if ($Data) {
            return redirect('CategoriesIndex')->with('saved', 'Successfully Updated Category');
        } else{
            return redirect('CategoriesIndex')->with('fail','Failed Updated Category Please Try Again');
        }
    }

    public function CategoryDelete($id)
    {
        $Model = new category;
        $Data = $Model->deleteCategory($id);
        if ($Data === "cant delete") {
            return redirect('CategoriesIndex')->with('fail',' There is products assigned to this category');
        }
        if ($Data) {
            return redirect('CategoriesIndex')->with('saved', 'Successfully Deleted Category');
        } else{
            return redirect('CategoriesIndex')->with('fail','Failed Delete Category Please Try Again');
        }
    }
}
