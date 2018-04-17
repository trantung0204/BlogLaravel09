<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['name','slug','parent_id'];

    public static function getAll()
    {
    	return Category::get();
    }
    /**
     * Xoa ban ghi theo id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function del($id)
    {
    	Category::find($id)->delete();
    }
    /**
     * Lưu dữ liệu vào database
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function storeData($data)
    {
    	return Category::create($data);

    	/*cách khác*/
    	/*$product = new Product;
    	$product->name=$data['name'];
    	$product->price=$data['price'];
    	$product->save();
    	return $product;*/
    }
    public static function updateData($id,$data)
    {
    	$Category= Category::find($id);
    	$Category->update($data);
    	return $Category;
    }
    public function posts()
    {
    	return $this->hasMany('App\Post','category_id', 'id');
    }
}
