<?php

namespace App\Http\Controllers\Vandor;

use App\Http\Controllers\Controller;
use App\Models\Vandor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class VandorDashboardController extends Controller
{
    public function VandorDashobard(){

        $id = Auth::guard('vandor')->user()->id;
        $data['info'] = Vandor::where('id',$id)->first();

      return view('VandorDashboard.main',$data);
    }

    //------------------Profile Info Update----------------

    public function VandorProfile($id){

        $data['info'] = Vandor::where('id',$id)->first();
       return view('VandorDashboard.profile.profile',$data);
    }

    public function VandorProfileUpdate(Request $request){

        $update = Vandor::where('id',$request->EditeId)->first();
        $update->f_name = $request->f_name;
        $update->phone = $request->phone;
        $update->street_address = $request->street_address;
        $update->city = $request->city;
        $update->state = $request->state;
        $update->zip = $request->zip;
        $update->save();

        if($request->hasFile('profile')){
            $image_profile = $request->file('profile');
            $fullname_profile = time().'.'.$image_profile->getClientOriginalExtension();
            @unlink('upload/Vandor/profile/'.$update->profile);
            Image::make($image_profile)->resize(100,100)->save('upload/Vandor/profile/'.$fullname_profile);
            $update->profile = $fullname_profile;
            $update->save();
        }

        if($request->hasFile('shop_image')){
            $image_shop_image = $request->file('shop_image');
            $fullname_shop_image = time().'.'.$image_shop_image->getClientOriginalExtension();
            @unlink('upload/Vandor/shop_image/'.$update->shop_image);
            Image::make($image_shop_image)->resize(160,29)->save('upload/Vandor/shop_image/'.$fullname_shop_image);
            $update->shop_image = $fullname_shop_image;
            $update->save();
        }

        if($request->hasFile('shop_banner')){
            $image_shop_banner = $request->file('shop_banner');
            $fullname_shop_banner = time().'.'.$image_shop_banner->getClientOriginalExtension();
            @unlink('upload/Vandor/shop_banner/'.$update->shop_banner);
            Image::make($image_shop_banner)->resize(1200,500)->save('upload/Vandor/shop_banner/'.$fullname_shop_banner);
            $update->shop_banner = $fullname_shop_banner;
            $update->save();
        }

        return redirect()->back();


    }
}
