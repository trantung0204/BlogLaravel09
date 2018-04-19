<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guest extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $table='guests';
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
        return Guest::get();
    }
    /**
     * Xoa ban ghi theo id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function del($id)
    {
        Guest::find($id)->delete();
    }
    /**
     * Lưu dữ liệu vào database
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function storeData($data)
    {
        return Guest::create($data);

        /*cách khác*/
        /*$product = new Product;
        $product->name=$data['name'];
        $product->price=$data['price'];
        $product->save();
        return $product;*/
    }
    public static function updateData($id,$data)
    {
        $guest= Guest::find($id);
        $guest->update($data);
        return $guest;
    }
    protected $hidden = [
        'password', 'remember_token',
    ];
}
