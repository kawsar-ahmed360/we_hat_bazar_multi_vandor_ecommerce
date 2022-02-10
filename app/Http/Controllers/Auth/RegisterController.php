<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vandor;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Admin\AboutUs;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\OurClientThinkOfUs;
use App\Models\Admin\ProductManage;
use App\Models\Admin\SectionManage;
use App\Models\Client\AllPageSeoTools;
use Cart;
use Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:vandor');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }


    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    //-------------------Vandor Register----------

     public function showVandorRegisterForm(){
         $data['slider'] = Admin\SliderManage::get();
         $data['about'] = AboutUs::where('id','1')->first();
         $data['section'] = SectionManage::where('highlight','1')->get();
         $data['product'] = ProductManage::get();
         $data['count'] = Cart::count();
         $data['ourclient'] = OurClientThinkOfUs::get();
         $data['meta'] = AllPageSeoTools::where('id','1')->first();
         $data['category']=CategoryManage::get();


         return view('ClientSite.single_page.Vandor.registration',$data);
     }

     public function StoreVandorRegisterForm(Request $request){


         $request->validate([
             'f_name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8'],
             'phone' => ['required'],
             'city' => ['required'],
             'street_address' => ['required'],
             'zip' => ['required'],
             'shop_name' => ['required'],

         ]);

         $store = new Vandor();
         $store->name = $request->name;
         $store->f_name = $request->f_name;
         $store->phone = $request->phone;
         $store->street_address = $request->street_address;
         $store->city = $request->city;
         $store->state = $request->state;
         $store->zip = $request->zip;
         $store->product_being_displayed = $request->product_being_displayed;
         $store->shop_name = $request->shop_name;
         $store->after_hash_passowrd = $request->password;
         $store->email = $request->email;
         $store->password = Hash::make($request->password);
         $store->save();

         if($request->hasFile('profile')){
             $profile = $request->file('profile');
             $fullprofile = time().'.'.$profile->getClientOriginalExtension();
             Image::make($request->profile)->resize(200,200)->save('upload/Vandor/profile/'.$fullprofile);
             $store->profile = $fullprofile;
             $store->save();
         }

         if($request->hasFile('shop_image')){
             $shopimage = $request->file('shop_image');
             $fullshopimage = time().'.'.$shopimage->getClientOriginalExtension();
             Image::make($request->shop_image)->resize(100,100)->save('upload/Vandor/shop_image/'.$fullshopimage);
             $store->shop_image = $fullshopimage;
             $store->save();
         }

         if($request->hasFile('shop_banner')){
             $shopbanner = $request->file('shop_banner');
             $fullshopbanner = time().'.'.$shopbanner->getClientOriginalExtension();
             Image::make($request->shop_image)->resize(1200,500)->save('upload/Vandor/shop_image/'.$fullshopbanner);
             $store->shop_banner = $fullshopbanner;
             $store->save();
         }

         if (Auth::guard('vandor')->attempt(['email' => $store->email, 'password' => $store->password])) {

             return redirect()->intended('/Vandor/vandor-dashboard');
//            return "vandor ok";
         }else{
             return "not ok";
         }

     }
}
