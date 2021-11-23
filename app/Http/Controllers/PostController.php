<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('backend.post.index',compact('posts'));
    }

    public function removeImage($file){
        $path = public_path('upload/post/'.$file->image);
        if(isset($path))
            unlink($path);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
            'quote' => 'required',
            'category' => 'required',
            'tags' => 'required'
        ],[

        ]);

        $post = new Post();
        $post->name = $request->name;
        $post->slug = Str::slug($request->name).'-'.Carbon::now()->timestamp;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->quote = $request->quote;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $imageName = $post->slug.'.'.$request->image->extension();
            $request->image->storeAs('post',$imageName);
            $post->image = $imageName;
        }
        $post->save();

        foreach ($request->tags as $tag) {
            $post_tag = new PostTag();
            $post_tag->post_id = $post->id;
            $post_tag->tag_id = $tag;
            $post_tag->save();
        }

        session()->flash('message','Thêm bài viết thành công !');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('backend.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::where('id','!=',$post->category_id)->get();        
        $post_tags = PostTag::where('post_id',$post->id)->get();
        $tags = Tag::all();

        return view('backend.post.update',compact('post','categories','tags','post_tags'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'new_image' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048',
            'quote' => 'required',
            'category' => 'required',
        ],[

        ]);

        $post = Post::find($id);
        $post->name = $request->name;
        $post->slug = Str::slug($request->name).'-'.Carbon::now()->timestamp;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->quote = $request->quote;
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('new_image')) {
            $this->removeImage($post);
            $imageName = $post->slug.'.'.$request->new_image->extension();
            $request->new_image->storeAs('post',$imageName);
            $post->image = $imageName;
        }
        $post->save();
        if ($request->new_tags) {
            $tags = PostTag::where('post_id',$post->id)->get();
            foreach ($tags as $tag) {
                $tag->delete();
            }
            foreach ($request->new_tags as $tag) {
                $post_tag = new PostTag();
                $post_tag->post_id = $post->id;
                $post_tag->tag_id = $tag;
                $post_tag->save();
            }
        }

        session()->flash('message','Cập nhật bài viết thành công !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $this->removeImage($post);
        $post->delete();

        session()->flash('message','Xóa bài viết thành công !');
        return back();
    }
}
