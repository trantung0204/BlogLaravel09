<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $fillable=['title','thumbnail','description','content','slug','status','user_id','category_id'];

    public static function getAll()
    {
    	return Post::get();
    }
    /**
     * Xoa ban ghi theo id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public static function del($id)
    {
    	Post::find($id)->delete();
    }
    /**
     * Lưu dữ liệu vào database
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public static function storeData($data)
    {
    	return Post::create($data);

    	/*cách khác*/
    	/*$product = new Product;
    	$product->name=$data['name'];
    	$product->price=$data['price'];
    	$product->save();
    	return $product;*/
    }
    public static function updateData($id,$data)
    {
    	$post= Post::find($id);
    	$post->update($data);
    	return $post;
    }
    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
}
