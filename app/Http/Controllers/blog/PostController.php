<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function blogHome()
    {
        $posts=Post::orderBy('id', 'desc')->paginate(8);
        $new_posts=Post::orderBy('id', 'asc')->paginate(4);
        $categories=Category::all();
        //dd($products);
        return view('blog.page.home',compact('posts','new_posts','categories'));// cách truyền khác: compact('products')
    }
    public function viewPost($slug)
    {
        $post=Post::where('slug', '=',$slug)->first();
        $nextPost=null;
        $previousPost=null;
        $last=Post::orderBy('id', 'desc')->first();
        $nextPostId=$post->id;
        $previousPostId=$post->id;
        do{
        	$nextPostId++;
        	$nextPost=Post::where('id', '=',($nextPostId))->first();

        }while(!isset($nextPost)&&$nextPostId<=$last->id);
        do{
        	$previousPostId--;
        	$previousPost=Post::where('id', '=',($previousPostId))->first();
        }while(!isset($previousPost)&&$previousPostId>0);
        
        $categories=Category::all();
        //dd($products);
        return view('blog.page.posts',compact('post','nextPost','previousPost','categories'));// cách truyền khác: compact('products')
    }
    public function getPosts($slug)
    {
        $category=Category::where('slug', '=',$slug)->first();
        $posts=Post::where('category_id', '=',$category->id)->orderBy('id', 'desc')->paginate(8);
        $new_posts=Post::orderBy('id', 'asc')->paginate(4);
        $categories=Category::all();
        //$categories=Category::all();
        //dd($products);
        return view('blog.page.categories',compact('posts','new_posts','categories'));// cách truyền khác: compact('products')
    }
    //
}
