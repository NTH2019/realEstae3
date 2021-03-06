<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Post;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = Property::paginate(6);
        $city = Property::select('city','image','city_slug')->distinct('city_slug')->get();
        $posts = Post::paginate(6);
        $type = Property::select('type')->distinct('type')->get();

        return view('home',compact('properties','city','posts','type'));
    }

    public function dashboard () {
        $messages = Message::where('user_id',Auth::user()->id)->paginate(5);
        $properties = Property::where('user_id',Auth::user()->id)->paginate(5);
        return view('user.index',compact('messages','properties'));
    }

    public function property () {
        if (Auth::check())
            return view('user.property');
        return redirect()->route('login');
    }

    public function profile () {
        return view('user.profile');
    }

    public function removeImage($file){
        $path = public_path('upload/property/'.$file->image);
        if(isset($path))
            unlink($path);
    }

    public function removeProfilePath($file){
        $path = public_path('upload/property/'.$file->profile_path);
        if(isset($path))
            unlink($path);
    }

    public function update (Request $request) {
        // dd($request->all());
        $request->validate([
            'profile_path' => 'image|mimes:jpeg,png,jpg,svg,gif|max:2048',
            'name' => 'required',
            'email' => 'email|required',
            'idapartment' => 'required',
            'block' => 'required',
            'floor' => 'required',
            'cmnd' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'householdbook' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ],[
            'profile_path.image' => 'Nh???p ????ng ?????nh d???ng c???a ???nh',
            'profile_path.mimes' => 'Nh???p ????ng ?????nh d???ng c???a ???nh',
            'profile_path.max' => 'K??ch th?????c h??nh ???nh qu?? l???n',
            'name.required' => 'T??n c???a b???n kh??ng ???????c tr???ng',
            'email.required' => 'Email c???a b???n kh??ng ???????c tr???ng',
            'email.email' => 'Nh???p ????ng ?????nh d???ng c???a email',
            'idapartment.required' => 'M?? c??n h??? c???a b???n kh??ng ???????c tr???ng',
            'block.required' => 'Block c???a b???n kh??ng ???????c tr???ng',
            'floor.required' => 'T???ng c???a b???n kh??ng ???????c tr???ng',
            'cmnd.required' => 'CMND/ CCCD c???a b???n kh??ng ???????c tr???ng',
            'birthday.required' => 'Ng??y sinh c???a b???n kh??ng ???????c tr???ng',
            'gender.required' => 'Gi???i t??nh c???a b???n kh??ng ???????c tr???ng',
            'householdbook.required' => 'H??? kh???u c???a b???n kh??ng ???????c tr???ng',
            'address.required' => '?????a ch??? c???a b???n kh??ng ???????c tr???ng',
            'phone.required' => '??i???n tho???i c???a b???n kh??ng ???????c tr???ng',
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->idapartment = $request->idapartment;
        $user->block = $request->block;
        $user->floor = $request->floor;
        $user->cmnd = $request->cmnd;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->householdbook = $request->householdbook;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->facebook = $request->facebook;

        if ($request->hasFile('profile_path')) {
            if ($user->profile_path != 'no-image.png')
                $this->removeProfilePath($user);
            $imageName = $request->name.'-'.Carbon::now()->timestamp.'.'.$request->profile_path->extension(); 
            $request->profile_path->storeAs('user',$imageName);
            $user->profile_path = $imageName;
        }

        $user->save();
        session()->flash('message','C???p nh???t th??ng tin c???a b???n th??nh c??ng !');
        return back();
    }

    public function change (Request $request) {
        $request->validate([
            'pwd' => ['required', new MatchOldPassword],
            'new_pwd' => 'required|min:8',
            'confirm_pwd' => 'same:new_pwd',
        ],[
            'pwd.required' => 'M???t kh???u hi???n t???i kh??ng ???????c tr???ng !',
            'new_pwd.required' => 'M???t kh???u m???i kh??ng ???????c tr???ng !',
            'new_pwd.min' => 'M???t kh???u m???i ??t nh???t 8 k?? t??? !',
            'confirm_pwd.same' => 'M???t kh???u ph???i gi???ng nhau!',
        ]);
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_pwd)]);
        session()->flash('message','M???t kh???u c???a b???n ???? ???????c thay ?????i !');
        return back();
    }

    public function changepwd () {
        return view('user.change-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'purpose' => 'required',
            'description' => 'required',
            'bath' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'price' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048', 
            'floor_plan' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048', 
        ],[
            'name.required' => 'T??n c??n h??? kh??ng ???????c tr???ng',
            'type.required' => 'Lo???i c??n h??? kh??ng ???????c tr???ng',
            'purpose.required' => 'M???c ????ch kh??ng ???????c tr???ng',
            'description.required' => 'M?? t??? kh??ng ???????c tr???ng',
            'bath.required' => 'S??? ph??ng t???m kh??ng ???????c tr???ng',
            'bed.required' => 'S??? ph??ng ng??? kh??ng ???????c tr???ng',
            'area.required' => 'Di???n t??ch kh??ng ???????c tr???ng',
            'price.required' => 'Gi?? c??n h??? kh??ng ???????c tr???ng',
            'city.required' => 'Th??nh ph??? kh??ng ???????c tr???ng',
            'address.required' => '?????a ??i???m kh??ng ???????c tr???ng',
            'image.required' => 'H??nh ???nh ?????a di???n kh??ng ???????c tr???ng',
            'image.image' => 'Nh???p ????ng ?????nh d???ng h??nh ???nh',
            'image.mimes' => 'Nh???p ????ng lo???i h??nh ???nh',
            'image.max' => 'K??ch th?????c qu?? l???n',
            'floor_plan.image' => 'Nh???p ????ng ?????nh d???ng h??nh ???nh',
            'floor_plan.mimes' => 'Nh???p ????ng lo???i h??nh ???nh',
            'floor_plan.max' => 'K??ch th?????c qu?? l???n',
        ]);
        $property = new Property();
        $property->name = $request->name;
        $property->slug = Str::slug($request->name).'-'.Carbon::now()->timestamp;
        if ($request->type == "house")
            $property->type = "C??n h???";
        else 
            $property->type = "Chung c??";
        $property->type_slug = Str::slug($property->type);
        if ($request->purpose == "sale") 
            $property->purpose = "B??n";
        else
            $property->purpose = "Cho thu??";
        $property->description = $request->description;
        $property->bed = $request->bed;
        $property->bath = $request->bath;
        $property->area = $request->area;
        $property->price = $request->price;
        $property->city = $request->city;
        $property->city_slug = Str::slug($request->city);
        $property->address = $request->address;
        $property->video = $request->video;
        $property->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $imageName = $property->slug.'.'.$request->image->extension();
            $request->image->storeAs('property',$imageName);
            $property->image = $imageName;
        }
        else 
            $property->image = "no-image.jpg";

        if ($request->hasFile('floor_plan')) {
            $floor_plan = 'ban-thiet-ke'.'-'.Carbon::now()->timestamp.'.'.$request->floor_plan->extension();
            $request->floor_plan->storeAs('property',$floor_plan);
            $property->floor_plan = $floor_plan;
        }

        $property->save();
        
        if ($request->hasFile('images')) {
            foreach ($request->images as $item) {
                $img = new PropertyImage();
                $img->property_id = $property->id;
                $name = Str::random(8).'-'.$item->extension();
                $item->storeAs('property',$name);
                $img->image = $name;
                $img->save();
            }
        }
        session()->flash('message','Th??m c??n h??? th??nh c??ng!');
        return back();
    }

    public function removeFloorPlan($file){
        $path = public_path('upload/property/'.$file->floor_plan);
        if(isset($path))
            unlink($path);
    }

    public function destroy($id) {
        $property = Property::find($id);
        $this->removeImage($property);
        $this->removeFloorPlan($property);

        foreach (PropertyImage::where('property_id',$property->id)->get() as $item) {
            $this->removeImage($item);
        }

        $property->delete();
        session()->flash('message','X??a c??n h??? th??nh c??ng !');
        return back();
    }
}
