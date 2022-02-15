<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\SliderManage;
use App\Models\Vandor;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\AboutUs;
use App\Models\Admin\CategoryManage;
use App\Models\Admin\OurClientThinkOfUs;
use App\Models\Admin\ProductManage;
use App\Models\Admin\SectionManage;
use App\Models\Client\AllPageSeoTools;
use Cart;
use Image;


class LoginController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



    public function showLoginForm()
    {
        return view('auth.User.login');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:vandor')->except('logout');
    }

    //------------Super Admin Registration----------

    public function showAdminLoginForm()
    {

        return view('auth/Admin/login', ['url' => 'admin']);
    }


    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/SuperAdmin/admin-dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));

    }


    //------------Vandor Registration----------



    public function showVandorLoginForm()
    {
        return view('auth/Vandor/login', ['url' => 'vandor']);
    }


    public function VandorLogin(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);


        if (Auth::guard('vandor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/Vandor/vandor-dashboard');
//            return "vandor ok";
        }
        return back()->withInput($request->only('email', 'remember'));

    }


    //-------------------Vandor Register----------

    public function showVandorRegisterForm(){
        $data['slider'] = SliderManage::get();
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
            'password' => ['required', 'string', 'min:8','confirmed'],
            'phone' => ['required'],
            'city' => ['required'],
            'street_address' => ['required'],
            'zip' => ['required'],
            'shop_name' => ['required'],
            'shop_image' => ['required'],

        ]);

        $first = $request->shop_name;
        $cou = str_split($first);
        $concat = $cou[0].$cou[1].$cou[2].$cou[3];

        $shopId = 'WE-'.$concat.rand(00000,99999);



        $store = new Vandor();
        $store->name = $request->name;
        $store->f_name = $request->f_name;
        $store->phone = $request->phone;
        $store->street_address = $request->street_address;
        $store->city = $request->city;
        $store->state = $request->state;
        $store->zip = $request->zip;
        $store->shop_id = $shopId;
        $store->product_being_displayed = $request->product_being_displayed;
        $store->shop_name = $request->shop_name;
        $store->after_hash_passowrd = $request->password;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);


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
            Image::make($request->shop_image)->resize(1200,500)->save('upload/Vandor/shop_banner/'.$fullshopbanner);
            $store->shop_banner = $fullshopbanner;
            $store->save();
        }

        $store->save();

       return $this->VandorLogin($request);

    }





}
