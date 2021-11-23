<?php

namespace App\Http\Controllers;

use App\Models\CommentPost;
use App\Models\PropertyImage;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Post;
use App\Models\Property;
use App\Models\Setting;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        $properties = Property::all();
        $posts = Post::all();
        $comments = CommentPost::all();
        $contacts = Contact::paginate(8);
        return view('backend.index',compact('properties', 'posts', 'comments', 'contacts'));
    }

    public function setting () {
        $setting = Setting::first();
        return view('backend.setting',compact('setting'));
    }

    public function store (Request $request) {
        $request->validate([
            'description' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'pinterest' => 'required',
        ],[
            'description.required' => 'Mô tả không được trống',
            'phone.required' => 'Điện thoại không được trống',
            'email.required' => 'Email không được trống',
            'email.email' => 'Nhập đúng định dạng email',
            'facebook.required' => 'Facebook không được trống',
            'twitter.required' => 'Twitter không được trống',
            'instagram.required' => 'Instagram không được trống',
            'pinterest.required' => 'Pinterest không được trống',
        ]);
        if (Setting::first())
            $setting = Setting::first();
        else
            $setting = new Setting();
        $setting->description = $request->description;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->pinterest = $request->pinterest;
        $setting->save();

        session()->flash('message','Cập nhật thông tin thành công !');
        return back();
    }

    public function adminProfile() {
        $user = Auth::user();
        return view('backend.user.profile',compact('user'));
    }

    public function removeImage($file){
        $path = public_path('upload/user/'.$file->profile_path);
        if(isset($path))
            unlink($path);
    }

    public function profile (Request $request) {
        $request->validate([
            'profile_path' => 'image|mimes:jpeg,png,jpg,svg,gif|max:2048',
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'required',
            'address' => 'required',
        ],[
            'profile_path.image' => 'Nhập đúng định dạng của ảnh',
            'profile_path.mimes' => 'Nhập đúng định dạng của ảnh',
            'profile_path.max' => 'Kích thước hình ảnh quá lớn',
            'name.required' => 'Tên của bạn không được trống',
            'email.required' => 'Email của bạn không được trống',
            'email.email' => 'Nhập đúng định dạng của email',
            'address.required' => 'Địa chỉ của bạn không được trống',
            'phone.required' => 'Điện thoại của bạn không được trống',
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->facebook = $request->facebook;

        if ($request->hasFile('profile_path')) {
            if ($user->profile_path != 'no-image.png')
                $this->removeImage($user);
            $imageName = $request->name.'-'.Carbon::now()->timestamp.'.'.$request->profile_path->extension(); 
            $request->profile_path->storeAs('user',$imageName);
            $user->profile_path = $imageName;
        }

        $user->save();
        session()->flash('message','Cập nhật thông tin của bạn thành công !');
        return back();
    }

    public function password () {
        return view('backend.user.change-password');
    }

    public function update (Request $request) {
        $request->validate([
            'pwd' => ['required', new MatchOldPassword],
            'new_pwd' => 'required|min:8',
            'confirm_pwd' => 'same:new_pwd',
        ],[
            'pwd.required' => 'Mật khẩu hiện tại không được trống !',
            'new_pwd.required' => 'Mật khẩu mới không được trống !',
            'new_pwd.min' => 'Mật khẩu mới ít nhất 8 ký tự !',
            'confirm_pwd.same' => 'Mật khẩu phải giống nhau!',
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_pwd)]);
        session()->flash('message','Mật khẩu của bạn đã được thay đổi !');
        return back();
    }

    

    public function message () {
        $messages = Message::where('user_id',Auth::user()->id)->paginate(5);
        return view('backend.user.message',compact('messages'));
    }

    public function guest () {
        $user = DB::table('users')->get(); 
        
        return view('backend.user.guest',compact('user'));
        return dd($user);

    }

    public function destroy($id)
    {
        $user =User::where('id',$id)->first();
        $path = public_path('upload/user'.$user->image);
        if (is_file($path)){
        unlink($path);
    }

        $user->delete();
        session()->flash('message','Xóa bài viết thành công !');
        return back();
    }
}
