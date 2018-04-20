<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        $categories=Category::all();
        //dd($products);
        return view('admin.post.dashboard',compact('posts','categories'));// cách truyền khác: compact('products')
    }
    public function blogHome()
    {
        $posts=Post::all();
        $categories=Category::all();
        //dd($products);
        return view('blog.page.home',compact('posts','categories'));// cách truyền khác: compact('products')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('thumbnail')) {
            # code...
            $request->validate([
                'title'         => 'required',
                'description'   => 'required',
                'content'       => 'required',
                'category_id'   => 'required',
                /*'user_id'       => 'required',*/
                'slug'          => 'required',
                'thumbnail'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName= 'http://tungdeptrai.org/storage/app/images/posts/'.time().'.'.$request->thumbnail->getClientOriginalExtension();

            $request->thumbnail->move(public_path('storage/app/images/posts'), $imageName);
        }else{
            $request->validate([
                'title'         => 'required',
                'description'   => 'required',
                'content'       => 'required',
                'category_id'   => 'required',
                //'user_id'       => 'required',
                'slug'          => 'required',
            ]);
                $imageName='/images/posts/userDefault.png';
        }
        
        $data=$request->all();
        //$data['user_id'] = Auth::user()->id;
        unset($data['thumbnail']);
        //unset($data['tags']);
        $data['thumbnail']=$imageName;
        $data['user_id'] = Auth::user()->id;
        $result= Post::create($data);
        return $result;
        // return redirect()->back();
        // 
        /*$request->file->store('image/postThumbnails');
        dd($path);
        return Post::storeData($request->only(['name','thumbnail','description','content','slug','user_id','category_id']));*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->all();

        return response()->json($data);
        // if ($request->hasFile('thumbnail')) {
        //     $request->validate([
        //         'title'         => 'required',
        //         'description'   => 'required',
        //         'content'       => 'required',
        //         'category_id'   => 'required',
        //         /*'user_id'       => 'required',*/
        //         'slug'          => 'required',
        //         'thumbnail'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        //     $imageName= 'http://tungdeptrai.org/storage/app/images/posts/'.time().'.'.$request->thumbnail->getClientOriginalExtension();

        //     $request->thumbnail->move(public_path('storage/app/images/posts'), $imageName);
        // }else{
        //     $request->validate([
        //         'title'         => 'required',
        //         'description'   => 'required',
        //         'content'       => 'required',
        //         'category_id'   => 'required',
        //         //'user_id'       => 'required',
        //         'slug'          => 'required',
        //     ]);
        //         $po=Post::where('id',$id)->first();
        //         $imageName=$po->thumbnail;
        // }
        
        // $data=$request->all();
        // //$data['user_id'] = Auth::user()->id;
        // unset($data['thumbnail']);
        // //unset($data['tags']);
        // $data['thumbnail']=$imageName;
        // $data['user_id'] = Auth::user()->id;
        // $result= Post::updateData($id,$data->only(['title','thumbnail','description','content','slug','user_id','category_id']));
        // if($result){
        //     $post= Post::find($id);
        //     return response()->json([
        //         'data'=>$post
        //     ], 200);
        // }else{
        //     return response()->json( 500);
        // }

        // $result = Post::updateData($id,$request);
        // if($result){
        //     $post= Post::find($id);
        //     return response()->json([
        //         'data'=>$post
        //     ], 200);
        // }else{
        //     return response()->json( 500);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Post::del($id);
    }
}
