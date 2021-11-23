<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades\Toastr;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::paginate(5);
        return view('backend.property.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.property.create');
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
            'type' => 'required',
            'purpose' => 'required',
            'bath' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'price' => 'required',
            'city' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:2048', 
            'floor_plan' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048', 
        ]);
        $property = new Property();
        $property->name = $request->name;
        $property->slug = Str::slug($request->name).'-'.Carbon::now()->timestamp;
        if ($request->type == "house")
            $property->type = "Căn hộ";
        else 
            $property->type = "Chung cư";
        $property->type_slug = Str::slug($property->type);
        if ($request->purpose == "sale") 
            $property->purpose = "Bán";
        else
            $property->purpose = "Cho thuê";
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
        session()->flash('message','Thêm căn hộ thành công!');
        return redirect()->route('property.create');
    }

    // YOUTUBE LINK TO EMBED CODE
    private function convertYoutube($youtubelink, $w = 500, $h = 240) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"$w\" height=\"$h\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allowfullscreen></iframe>",
            $youtubelink
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        $video = $this->convertYoutube($property->video);
        $images = PropertyImage::where('property_id',$id)->get();
        $property->increment('view');   

        return view('backend.property.show',compact('property','video','images'));
    }

    public function removeImage($file){
        $path = public_path('upload/property/'.$file->image);
        if(isset($path))
            unlink($path);
    }

    public function removeFloorPlan($file){
        $path = public_path('upload/property/'.$file->floor_plan);
        if(isset($path))
            unlink($path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        $first = PropertyImage::where('property_id',$id)->orderBy('id',"DESC")->first();
        $images = PropertyImage::where('property_id',$id)->where('property_id','!=',$first->id)->get();
        
        return view('backend.property.update',compact('property','images','first'));
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
            'type' => 'required',
            'purpose' => 'required',
            'bath' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'price' => 'required',
            'city' => 'required',
            'address' => 'required',
            'new_image' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048', 
            'new_floor_plan' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048', 
        ]);
        $property = Property::find($id);
        $property->name = $request->name;
        $property->slug = Str::slug($request->name).'-'.Carbon::now()->timestamp;
        if ($request->type == "house")
            $property->type = "Căn hộ";
        else 
            $property->type = "Chung cư";
        $property->type_slug = Str::slug($property->type);
        if ($request->purpose == "sale") 
            $property->purpose = "Bán";
        else
            $property->purpose = "Cho thuê";
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

        if ($request->hasFile('new_image')) {
            $this->removeImage($property);
            $imageName = $property->slug.'.'.$request->new_image->extension();
            $request->new_image->storeAs('property',$imageName);
            $property->image = $imageName;
        }

        if ($request->hasFile('new_floor_plan')) {
            $this->removeFloorPlan($property);
            $floor_plan = 'ban-thiet-ke'.'-'.Carbon::now()->timestamp.'.'.$request->new_floor_plan->extension();
            $request->new_floor_plan->storeAs('property',$floor_plan);
            $property->floor_plan = $floor_plan;
        }

        $property->save();
        
        if ($request->hasFile('new_images')) {
            foreach ($request->new_images as $item) {
                $img = new PropertyImage();
                $img->property_id = $property->id;
                $name = Str::random(8).'.'.$item->extension();
                $item->storeAs('property',$name);
                $img->image = $name;
                $img->save();
            }
        }
        session()->flash('message','Cập nhật căn hộ thành công!');
        return redirect()->route('property.edit',['property' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $this->removeImage($property);
        $this->removeFloorPlan($property);

        foreach (PropertyImage::where('property_id',$property->id)->get() as $item) {
            $this->removeImage($item);
        }

        $property->delete();
        session()->flash('message','Xóa căn hộ thành công !');
        return back();
    }
}
