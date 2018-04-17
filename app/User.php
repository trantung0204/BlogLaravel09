<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $table='users';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public static function getAll()
    {
        return User::get();
    }
    /**
     * Xoa ban ghi theo id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function del($id)
    {
        User::find($id)->delete();
    }
    /**
     * Lưu dữ liệu vào database
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function storeData($data)
    {
        return User::create($data);

        /*cách khác*/
        /*$product = new Product;
        $product->name=$data['name'];
        $product->price=$data['price'];
        $product->save();
        return $product;*/
    }
    public static function updateData($id,$data)
    {
        $user= User::find($id);
        $user->update($data);
        return $user;
    }
    protected $hidden = [
        'password', 'remember_token',
    ];
}
