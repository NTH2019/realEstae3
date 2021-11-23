<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CommentPost;
use App\Models\Contact;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function news() {
        $posts = Post::paginate(9);
        $categories = Category::all();
        $tags = Tag::all();
        $hots = Post::orderBy('view','DESC')->limit(5)->get();

        return view('news',compact('posts','categories','tags','hots'));
    }

    public function category($slug) {
        $category = Category::where('slug',$slug)->first();
        $posts = Post::where('category_id',$category->id)->paginate(9);
        $categories = Category::all();
        $tags = Tag::all();
        $hots = Post::orderBy('view','DESC')->limit(5)->get();

        return view('news',compact('posts','categories','tags','hots'));
    }

    public function tag($slug) {
        $tag = Tag::where('slug',$slug)->first();
        $posts = PostTag::where('tag_id',$tag->id)->paginate(9);
        $categories = Category::all();
        $tags = Tag::all();
        $hots = Post::orderBy('view','DESC')->limit(5)->get();

        return view('tag',compact('posts','categories','tags','hots'));
    }

    public function detail ($slug) {
        $post = Post::where('slug',$slug)->first();
        $categories = Category::all();
        $tags = PostTag::where('post_id',$post->id)->get();
        $tag_total = Tag::all();
        $hots = Post::orderBy('view','DESC')->limit(5)->get();
        $post->increment('view');
        $comments = CommentPost::where('post_id',$post->id)->get();
        return view('news-detail',compact('post','tags','categories','tag_total','hots','comments'));
    }

    public function search (Request $request) {
        $posts = Post::where('name','LIKE','%'.$request->search.'%')->paginate(9);
        $categories = Category::all();
        $tags = Tag::all();
        $hots = Post::orderBy('view','DESC')->limit(5)->get();

        return view('news',compact('posts','categories','tags','hots'));
    }

    public function contact () {
        $setting = Setting::first();
        return view('contact',compact('setting'));
    }

    public function store (Request $request) {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return response()->json();
    }

    public function comment(Request $request) {
        $comment = new CommentPost();
        if (Auth::check())
            $comment->name = Auth::user()->name;
        else
            $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();

        return back();
    }
}
