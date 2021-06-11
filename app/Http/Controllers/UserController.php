<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Flash; 
class UserController extends Controller
{
    public function UsersIndex()
    {
        $Model = new User;
        $Data = $Model->getUsers();
        if ($Data) {
            return view('UsersIndex' , ['users' =>$Data]);
        } else {
            return redirect()->route('UsersIndex')->with( Session::flash('fail','Failed returned data please Try Again'));
        }
    }

    public function User()
    {
        return view('createUser');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users',
            'password' => 'required|min:8|max:20',
        ]);
        
        $Model = new User;
        $StoreData = $Model->StoreUser($request);
        if ($StoreData) {
            return redirect('UsersIndex')->with('saved', 'Successfully Added User');
        } else {
            return redirect('createUser')->with('fail','Coudnt Added The User please Try Again');
        }
    }

    public function userById($id)
    {
        $Model = new User;
        $Data = $Model->getUsersId($id);
        if ($Data) {
            return view('UserEdit' , ['user' =>$Data]);
        } else{
            return redirect('UsersIndex')->with('fail','Failed returned data please Try Again');
        }
    }

    public function editUser(Request $request , $id)
    {
        $this->validate($request, [
            'email' =>'email',
            'name' => 'required',
            'password' => 'required|min:8|max:20',
        ]);

        $Model = new User;
        $Data = $Model->updateUser($request , $id);
        if ($Data) {
            return redirect('UsersIndex')->with('saved', 'Successfully Updated User Data');
        } else{
            return redirect('UsersIndex')->with('fail','Failed Updated Data Please Try Again');
        }
    }

    public function UserDelete($id)
    {
        $Model = new User;
        $Data = $Model->deleteUser($id);
        if ($Data === "cant delete") {
            return redirect('UsersIndex')->with('fail',' There is products assigned to this User');
        }
        if ($Data) {
            return redirect('UsersIndex')->with('saved', 'Successfully Deleted User');
        } else{
            return redirect('UsersIndex')->with('fail','Failed Delete User Please Try Again');
        }
    }
}
