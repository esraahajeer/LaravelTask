<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function StoreUser($request)
    {

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return $data;
    }

    public function getUsers()
    {
        $users = User::paginate(10);
        return $users;
    }

    public function getUsersId($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateUser($request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        if ($user->save()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deleteUser($id)
    {
        $data = product::where('user_id', $id)->pluck('user_id')->first();
        if ($data) {
            return "cant delete";
        }else{
            $data = User::find($id)->delete();
            return $data;
        }
        
    }
}
