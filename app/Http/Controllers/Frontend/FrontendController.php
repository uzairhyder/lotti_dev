<?php

namespace App\Http\Controllers\Frontend;

use stripe;
use App\Models\User;
use App\Models\BillingInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Frontend\City;
use App\Models\Frontend\State;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Return_;
use App\Models\OrderNotification;
use App\Models\ProductVariantion;
use Illuminate\Support\Facades\DB;
use App\Models\BackendModels\Brand;
use App\Models\BackendModels\Offer;
use App\Models\FrontendModels\Cart;
use App\Http\Controllers\Controller;
use App\Models\BackendModels\Banner;
use App\Models\BackendModels\Coupon;
use App\Models\BackendModels\Social;
use App\Models\FrontendModels\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Models\BackendModels\Inquiry;
use App\Models\BackendModels\Product;
use App\Models\FrontendModels\Review;
use App\Models\BackendModels\Shipping;
// use App\Models\BackendModels\Shipping;
use App\Models\BackendModels\Attribute;
use App\Models\BackendModels\OrderNote;
use App\Models\FrontendModels\Wishlist;
use Illuminate\Support\Facades\Session;
use App\Models\BackendModels\PageContent;
use App\Models\BackendModels\SubCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\BackendModels\MainCategory;
use App\Models\BackendModels\MultipleCity;
use App\Models\FrontendModels\UserAddress;
use App\Models\BackendModels\Configuration;
use App\Models\BackendModels\PrivacyPolicy;
use App\Models\FrontendModels\Subscription;
use App\Models\BackendModels\ParentCategory;
use App\Models\BackendModels\TermsCondition;
use App\Models\FrontendModels\OtpVerification;

class FrontendController extends Controller
{
    public function __construct()
    {
        $config = Configuration::first();
        $social = Social::first();
        $main = ParentCategory::with('get_main_cat', 'get_sub_cat')->where('status', 1)->get();
        view::share(get_defined_vars());
    }
    public function index()
    {

        $now = Carbon::now();

        // discount over if date expire
        $discounted_products = Product::where('discount_status', 1)->get();
        if($discounted_products){

            foreach($discounted_products as $discount_product){

                if($now->greaterThan($discount_product->sale_end)){
                    $d_product = Product::find($discount_product->id);
                    $d_product->discount_status = null;
                    $d_product->save();
                }


            }
        }
        // discount over if date expire



        $sale = Offer::where('section_name', 'biggest sale')->first();
        $buy_one = Offer::where('section_name', 'Buy One Get One Free')->first();
        $banners  = Banner::where('section_name', 'home-slider')->first();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $products = Product::where('slug', '!=', '')->where('status', 1)->with('product_variations','get_ratings')->withAvg('get_ratings', 'reviews')->latest()->take(8)->get();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $categories = SubCategory::where('show_home', 1)->take(8)->latest()->get();
        $home_categories = SubCategory::where('show_home', 1)->take(12)->latest()->get();
        $iphone_sect = PageContent::where('section_name','Discount Section')->first();
        $power_bank  = PageContent::where('section_name','Power Bank')->first();
        $android_sect  = PageContent::where('section_name','Andriod')->first();
        $watch = PageContent::where('section_name','Digital Watch')->first();
        $pc  = PageContent::where('section_name','Gaming PC')->first();
        $getwishlist = Wishlist::where('user_id', Auth::id())->get();

        return view('frontend.index', get_defined_vars());
    }
    public function register()
    {
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        return view('frontend.register', get_defined_vars());
    }
    public function login()
    {
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        return view('frontend.login', get_defined_vars());
    }
    public function forget()
    {
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        return view('frontend.forget', get_defined_vars());
    }
    public function terms()
    {
        $terms = TermsCondition::first();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('frontend.terms-conditions', get_defined_vars());
    }
    public function privacy()
    {
        $privacy = PrivacyPolicy::first();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('frontend.privacy-policy', get_defined_vars());
    }
    public function category()
    {
        $category  = Banner::where('section_name', 'category')->first();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('frontend.category', get_defined_vars());
    }
    public function shop_filter(Request $request)
    {

        $shop  = Banner::where('section_name', 'shop')->first();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $sub_categories = SubCategory::where('status',1)->get();



        // shop filters
        $query = Product::where('slug', '!=', '')->where('status', 1);

        // search by product name or tag
        if($request->search){

            $query->where('product_name', 'LIKE','%'.$request->search.'%');




            // $check_by_product_name = Product::where('slug', '!=', '')->where('status', 1)->where('product_name', 'LIKE','%'.$request->search.'%')->get();
            // if(count($check_by_product_name) > 0){
            //     $query->where('product_name', 'LIKE','%'.$request->search.'%');
            // }

            // $check_by_product_tag = Product::where('slug', '!=', '')->where('status', 1)->where('tags', 'LIKE','%'.$request->search.'%')->get();
            // if(count($check_by_product_tag) > 0){
            //     $query->where('tags', 'LIKE','%'.$request->search.'%');
            // }


        }


        // sub categories
        if($request->sub_category){
            $query->where('sub_category_id', $request->sub_category);
        }


        // stock products
        if($request->in_stock){
            $query->where('quantity','>', 0);
        }



        // range by price
        if($request->start_range && $request->end_range){
            $query->whereBetween('price',[(int) $request->start_range, (int) $request->end_range]);
        }


        // range by price
        $rating = $request->rating_star;


        $products = $query->with('get_ratings')->withAvg('get_ratings', 'reviews')->get();


        if($request->start_range && $request->end_range){
            $variableProductQeury = Product::where('product_type',2);
            $start = $request->start_range;
            $end = $request->end_range;
            $variableProductQeury->with('product_variations_filter', function($q) use ($start, $end){
                $q->whereBetween('regular_price',[(int) $start, (int) $end]);
            });

            $queries = $variableProductQeury->get();
            // $array = array();
            foreach($queries as $q){

                if(count($q->product_variations_filter) > 0){
                    $products->push($q);
                }
            }
        }


        return view('frontend.partials.shop-component', get_defined_vars())->render();
    }

    public function shop(Request $request)
    {

        $shop  = Banner::where('section_name', 'shop')->first();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $sub_categories = SubCategory::where('status',1)->get();

        // return $sub_categories;
        $query = Product::where('status', 1);
        $rating = '';


        $products = [];
        // main search
        if($request->search || empty($request->all())){

            $product_title_query = Product::where('slug', '!=', '')->where('status', 1)->where('product_name', 'LIKE','%'.$request->search.'%')->OrWhere('description', 'LIKE', '%'.$request->search.'%')->OrWhere('tags', 'LIKE', '%'.$request->search.'%')->get();
            // query check by product category
            $product_categories = SubCategory::where('status',1)->where('sub_category_name', 'LIKE', '%'.$request->search.'%')->withCount('products')->with('products')->has('products', '>' , 0)->get();
            // query check by product brand
            $product_brands = Brand::where('status',1)->where('brand_name', 'LIKE', '%'.$request->search.'%')->withCount('products')->with('products')->has('products', '>' , 0)->get();



            if(count($product_title_query) > 0){
                $query->where('product_name', 'LIKE','%'.$request->search.'%')->OrWhere('description', 'LIKE', '%'.$request->search.'%')->OrWhere('tags', 'LIKE', '%'.$request->search.'%');
            }

            // search by categories
            if(count($product_categories) > 0 || count($product_brands) > 0){
                $product_id = array();
                foreach($product_categories as $sub_category){
                    array_push($product_id, $sub_category->id);
                }

                $brand_product_id = array();
                foreach($product_brands as $product_brand){

                    array_push($brand_product_id, $product_brand->id);
                }

                $query->whereIn('sub_category_id', $product_id)->orwhereIn('brand_id', $brand_product_id);
            }





            $products = $query->with('get_ratings')->withAvg('get_ratings', 'reviews')->get();
            if(count($product_title_query) == 0 && count($product_categories) == 0 && count($product_brands) == 0){

                $products = [];
               }


            // categories control
            $parent_category = false;
            $main_category = false;
            $sub_category = false;

            // All categories not null
            $all_categories = true;
        }
        // end. main search


        if($request->category){

             // categories breadcrumbs
             $parent_category = ParentCategory::where('slug', $request->category)->first();
             $main_category = MainCategory::where('slug', $request->category)->with('get_parent_category','sub_category')->first();
             $sub_category = SubCategory::where('slug', $request->category)->with('get_parent_category','get_main_category')->first();

             if($parent_category){ $query->where('parent_category_id', $parent_category->id);}
             if($main_category){ $query->where('main_category_id', $main_category->id);}
             if($sub_category){ $query->where('sub_category_id', $sub_category->id);}

             $products = $query->with('get_ratings')->withAvg('get_ratings', 'reviews')->get();
            if(empty($parent_category) == 0 && empty($main_category) == 0 && empty($sub_category) == 0){
                $products = [];
            }else{
                $all_categories = false;
            }
        }else{

            $parent_category = false;
            $main_category = false;
            $sub_category = false;
            $all_categories = true;
        }

        // return $products;
        return view('frontend.shop', get_defined_vars());
    }
    public function product(Request $request, $slug)
    {

        $slug = $slug;
        $detail = Product::where('slug', '!=', '')->where('slug', $slug)->with('product_attributes.product_additional_attributes','get_parent_category', 'get_sub_category', 'get_brand_name', 'attributes','get_ratings')->withAvg('get_ratings', 'reviews')->first();
        if(!$detail){
            return view('frontend.404');
        }
        $variant_image = ProductVariantion::where('product_id',$detail->id)->get();
        // return $detail->attributes->unique('attribute');
        $ratings  = Review::where('product_id', $detail->id)->where('status', 1)->get();
        $avg =  $ratings->average('reviews');
        $review_count = Review::where('product_id', $detail->id)->where('status', 1)->count();
        $five_rating_count = Review::where('product_id', $detail->id)->where('reviews', 5)->where('status', 1)->count();
        $four_rating_count = Review::where('product_id', $detail->id)->where('reviews', 4)->where('status', 1)->count();
        $three_rating_count = Review::where('product_id', $detail->id)->where('reviews', 3)->where('status', 1)->count();
        $two_rating_count = Review::where('product_id', $detail->id)->where('reviews', 2)->where('status', 1)->count();
        $one_rating_count = Review::where('product_id', $detail->id)->where('reviews', 1)->where('status', 1)->count();
        $attr = Attribute::where('product_id', $detail->id)->get();
        $related =  Product::where('slug', '!=', '')->where('main_category_id', $detail->main_category_id)->with('product_attributes.product_additional_attributes','get_ratings')->withAvg('get_ratings', 'reviews')->get();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $getwishlist = Wishlist::where('user_id', Auth::id())->where('product_id',$detail->id)->first();


        return view('frontend.product', get_defined_vars());
    }
    public function cart(){

        if( Auth::check() && Auth::user()->role == 1){
            $notification = array('message' => 'You are logged in as admin please logout first ! ', 'alert-type' => 'error');
            return back()->with($notification);
        }

        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        // return $products = Cart::where('user_id', Auth::id())->with('attrs')->get();
        $products = Cart::where('user_id', Auth::id())->with('product','variations')->get();


        $carts = Cart::where('user_id', Auth::id())->with('product','variations')->get();
        $amount = 0;
        foreach($carts as $cart_item){

            if($cart_item->cart_id_checkbox == null){
                continue;
            }

            if($cart_item->product->product_type == 1){
                // simple product
                $product = Product::find($cart_item->product_id);
                // check discount and calculate price
                if ($cart_item->product->discount_status == null || $cart_item->product->discount_status == 0){
                        $amount += $cart_item->product->price * $cart_item->quantity;
                }else{
                     $amount += $cart_item->product->sale_price * $cart_item->quantity;
                }


            }else{
                // variable products

                $product = ProductVariantion::find($cart_item->product_variantion_id);
                // check discount and calculate price
                if ($product->discount_status == null || $product->discount_status == 0){
                    $amount += $product->regular_price * $cart_item->quantity;
                }else{
                    $amount += $product->sale_price * $cart_item->quantity;
                }
            }

        }

        $totalCheckboxesAuthUserTotalCalculation = Cart::where('user_id', Auth::id())->get()->count();
        $checkedAuthUserTotalCalculation = Cart::where('user_id', Auth::id())->where('cart_id_checkbox', '!=', '')->get()->count();
        // dd($totalCheckboxesAuthUserTotalCalculation.'-----'.$checkedAuthUserTotalCalculation);
        // dd($products);
        // if (session()->has('coupon_code')) {
        //     session()->forget('coupon_code');
        // }
        // // update work 20
        // if (session()->has('coupon_amount')) {
        //     session()->forget('coupon_amount');
        // }
        // if (session()->has('discount_type')) {
        //     session()->forget('discount_type');
        // }  if (session()->has('usage_limit_per_coupon')) {
        //     session()->forget('usage_limit_per_coupon');
        // }  if (session()->has('product_id')) {
        //     session()->forget('product_id');
        // }
        if (Auth::check()) {

            return view('frontend.cart', get_defined_vars());
        }
        $notification = array('message' => 'Please Login First !', 'alert-type' => 'error');
        return redirect()->route('login')->with($notification);
    }
    public function wishlist()
    {
        if( Auth::check() && Auth::user()->role == 1){
            $notification = array('message' => 'You are logged in as admin please logout first ! ', 'alert-type' => 'error');
            return back()->with($notification);
        }

        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $getwishlist = Wishlist::where('user_id', Auth::id())->with('get_product_name','product_variations','get_ratings')->withAvg('get_ratings', 'reviews')->get();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('frontend.wishlist', get_defined_vars());
    }
    public function contact()
    {
        $contact  = Banner::where('section_name', 'contact')->first();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('frontend.contact', get_defined_vars());
    }
    public function inquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'contact' => 'required|max:20',
            'email' => 'required|max:50',
            'name' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $inquiry = new Inquiry();
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->contact = $request->contact;
            $inquiry->message = $request->message;
            $inquiry->save();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'message' => $request->message,
            ];
            $email_admin = "djoy62471@gmail.com";
            Mail::send(
                'frontend.emails.contact_mail',
                ['data' => $data],
                function ($message) use ($email_admin) {
                    $message
                        ->to($email_admin, 'Inquiry')->subject('Inquiry');
                }
            );
            return response()->json([
                'status' => 200,
                'message' => 'Your Inquiry has been sent'
            ]);
        }
    }
    public function security()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('user-dashboard.security', get_defined_vars());
    }
    public function verifyemail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        $random  = random_int(100000, 999999);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $otp = new OtpVerification();
            $otp->email = $request->email;
            $otp->otp = $random;
            $data = [
                'email' => $request->email,
                'otp' => $random,
            ];
            $emailuser = $request->email;
            Mail::send('frontend.emails.otp_mail',['data' => $data],
                function ($message) use ($emailuser) {
                    $message->to($emailuser, 'user')->subject('OTP Verification');
                }
            );
            $otp->save();
            return response()->json([
                'status' => 200,
                'message' => 'OTP Sent'
            ]);
        }
    }

    public function usersave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gender' => 'required',
            'year' => 'required',
            'day' => 'required',
            'month' => 'required',
            'verify_code' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|unique:users,email',
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            if(Auth::check() && Auth::user()->role == 1 ){
                $notification = array('message' => 'You are Logged in as Admin please logout First !', 'alert-type' => 'error');
                return back()->with($notification);
            }

            $otp_check = OtpVerification::where('email', $request->email)->latest()->first();
            if ($otp_check->otp == $request->verify_code) {
                $user = new User();
                $today = Carbon::now();
                $user->year =  $request->year;
                $diff =   $today->year-$request->year;
                // return $diff;
                if($diff > 18){
                $user->name = $request->name;
                $user->day = $request->day;
                $user->month = $request->month;
                $user->gender = $request->gender;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->name = $request->first_name." ".$request->last_name;
                $user->slug = Str::slug($request->name, "-");
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->gender = $request->gender;
            //    dd($request->year);
                // if ($request->offers = 1) {
                //     $sub = new Subscription();
                //     $sub->email = $request->email;
                //     $sub->save();
                // }
                $user->role = 2;
                $user->status = 1;
                $user->save();
                }else{
                    return response()->json([
                        'status' => 503,
                        'message' => 'User is under 18',
                    ]);
                }
                $data = [
                    'name' => $request->first_name." ".$request->last_name,
                    'email' => $request->email,
                    'dob' => $request->month.'/'.$request->day.'/'.$request->year,
                    'gender' => $request->gender,
                ];
                $emailuser = $request->email;
                Mail::send('frontend.emails.signup_mail',  ['data' => $data], function ($message) use ($emailuser) {
                    $message->to($emailuser, 'user')->subject('New User');
                    }
                );
                $emailadmin = 'iamjamesalbertt@gmail.com';
                Mail::send('frontend.emails.signup_mail', ['data' => $data],function ($message) use ($emailadmin) {
                    $message->to($emailadmin, 'user')->subject('New User');
                    }
                );
                return response()->json([
                    'status' => 200,
                    'msg' => 'User Save Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 502,
                    'msg' => 'In Valid OTP'
                ]);
            }
        }
    }


    public function userlogin(Request $request)
    {
        $this->validate($request, [
            'password' => "required",
            'email' => "required",

        ]);

        if(Auth::check() && Auth::user()->role == 1 ){
            $notification = array('message' => 'You are Logged in as Admin please logout First !', 'alert-type' => 'error');
            return back()->with($notification);
        }

        // return 'test';
        $credentials = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ]);


        $user_status = User::where('email', $request->email)->first();
        if (User::where('email', $request->email)->exists()) {
            if ($credentials) {
                if (Auth::check() && Auth::user()->role == 2) {
                    $notification = array('message' => 'Login Successfully !', 'alert-type' => 'success');
                    return redirect('dashboard')->with($notification);
                } else {
                    return 'false';
                }
            }
            if($user_status->status == 0){
                $notification = array('message' => 'Your account is not approve from admin side !', 'alert-type' => 'error');
                return back()->with($notification);
            }
            else {
                $notification = array('message' => 'Invalid Credentials !', 'alert-type' => 'error');
                return back()->with($notification);
            }
        }

        else {
            $notification = array('message' => 'You are not registered in Lotti !', 'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    public function userlogout(Request $request)
    {

        Session::flush();
        Auth::logout();
        return redirect()->route('/');
    }
    // forget Password work

    public function verifyreset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        $random  = random_int(100000, 999999);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }
        $user_check = User::where('email', $request->email)->first();
        if (!$user_check) {
            return response()->json([
                'status' => 404,
                'message' => "User does not exist"
            ]);
        } else {
            $otp = new OtpVerification();
            $otp->email = $request->email;
            $otp->otp = $random;
            $data = [
                'email' => $request->email,
                'otp' => $random,
            ];
            $emailuser = $request->email;
            Mail::send(
                'frontend.emails.otp_mail',
                ['data' => $data],
                function ($message) use ($emailuser) {
                    $message
                        ->to($emailuser, 'user')->subject('OTP Verification');
                }
            );
            $otp->save();
            return response()->json([
                'status' => 200,
                'message' => 'OTP Sent'
            ]);
        }
    }
    public function otpverify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'verify_code' => 'required|max:50',
        ]);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $otp_check = OtpVerification::where('email', $request->email)->latest()->first();
            if ($otp_check->otp == $request->verify_code) {
                return response()->json([
                    'status' => 200,
                    'otp' => 'Verified'
                ]);
                $notification = array('message' => 'Email Verified !', 'alert-type' => 'success');
                return redirect()->route('update-password')->with($notification);
            } else {
                return response()->json([
                    'status' => 502,
                    'msg' => 'In Valid OTP'
                ]);
            }
        }
    }
    // public function forgetemail(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email|exists:users',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(
    //             ['status' => 400, 'errors' => $validator->errors()->toArray()]
    //         );
    //     }
    //     if (Auth::id() != null) {
    //         return response()->json([
    //             'status' => 419,
    //             'message' => "You are already Logged In !"
    //         ]);
    //     }
    //     $user_check = User::where('email', $request->email)->first();
    //     if (!$user_check) {
    //         return response()->json([
    //             'status' => 400,
    //             'message' => "User does not exist"
    //         ]);
    //     } else {
    //         $token = Str::random(64);
    //         DB::table('password_resets')->insert(
    //             ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
    //         );
    //         $data = [
    //             'name' => $user_check->name,
    //             'email' => $request->email
    //         ];
    //         $emailuser = $request->email;
    //         // return $emailToSend;
    //         Mail::send('frontend.emails.reset_mail', ['token'=> $token,'data' => $data],
    //         function ($message) use ($emailuser)
    //         {
    //             $message
    //             ->to($emailuser, 'Reset Password')->subject('Reset Password');
    //            });

    //         return response()->json([
    //             'status' => 200,
    //             'message' => "We have sent you password reset email",
    //         ]);
    //     }
    // }
    public function updatePassword()
    {
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('frontend.update-password', get_defined_vars());
    }
    public function updatePasswordProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'confirm_password' => 'required:with|same:password',
            'password' => 'required|min:8',
            'email' => 'required|email|exists:users',
        ]);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }
        // $updatePassword = DB::table('password_resets')
        //     ->where(['email' => $request->email, 'token' => $request->token])
        //     ->first();

        // if (!$updatePassword)
        //     // return redirect()->back()->with('unauthorize','You are not allowed to update');
        //     return response()->json([
        //         'status' => 404,
        //         'message' => "Invalid Token !",
        //     ]);
        else {
            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email' => $request->email])->delete();
            return response()->json([
                'status' => 200,
                'message' => "Password Updated Successfully",
            ]);
        }
    }


    public function addwishlist(Request $request, $slug)
    {

        if(Auth::check() && Auth::user()->role == 1){
            $notification = array('message' => 'Sorry! You are logged in as admin please logout first', 'alert-type' => 'error');
            return back()->with($notification);
        }

        $product = Product::where('slug', '!=', '')->where('slug', $slug)->first();


        if (Auth::id()) {
            // check in cart if already exist
            if (!empty(Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->first())) {
                $notification = array('message' => 'This item already added to wishlist !', 'alert-type' => 'error');
                return back()->with($notification);
            }

            // check if already exist
            if (!empty(Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first())) {
                $notification = array('message' => 'This item already added to cart!', 'alert-type' => 'error');
                return back()->with($notification);
            }





            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $product->id;
            $wishlist->slug = $request->slug;
            $wishlist->save();

            $notification = array('message' => 'Product Added To Wishlist !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);

        } else {
            $notification = array('message' => 'Please Login First !', 'alert-type' => 'error');
            return redirect()->route('login')->with($notification);
        }
    }
    public function checkout(Request $request)
    {

        if (Auth::id()) {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->product_id = session()->get('data')['id'];
            $order->quantity = 1;
            $order->total_price = session()->get('data')['total_price'];
            $order->order_status = 1;
            $order->billing_address_id = 1;
            $order->shipping_address_id = 2;
            // return $order;
            $order->save();
            $cart_data  = Cart::where('user_id', Auth::id())->first();
            $cart_data->delete();
            return response()->json([
                'status' => 200,
                'message' => 'transaction complete'
            ]);

            // $notification = array('message' => 'Thank you we have received your order !', 'alert-type' => 'success');
            // return redirect()->back()->with($notification);
        } else {
            $notification = array('message' => 'Please Login First!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function coupon_code(Request $request)
    {

        $coupon_name = Coupon::where('coupon_code', $request->coupon_code)->where('status',1)->first();
// product base coupon
        if(!$coupon_name){
            return response()->json(['status' => 405,'message' => 'Sorry!,coupon code is not valid']);
        }
        if($coupon_name->product_id && $coupon_name->discount_type==2){
            $cart_discount=Cart::withSum('variations','sale_price')->where('user_id',Auth::id())->whereIn('product_id',explode(',',$coupon_name->product_id))->whereHas('variations' , function($query) {
                return $query->where('discount_status', 1);
            })->with('variations' , function($query) {
                return $query->where('discount_status', 1);
            })->get();

            $cart_without_discount=Cart::withSum('variations','regular_price')->where('user_id',Auth::id())->whereIn('product_id',explode(',',$coupon_name->product_id))->whereHas('variations' , function($query) {
                return $query->where('discount_status',null);
            })->with('variations' , function($query) {
                return $query->where('discount_status',null);
            })->get();
            $quantity_cart_discount=$cart_discount->pluck('quantity')->sum();
            $quantity_no_discount=$cart_without_discount->pluck('quantity')->sum();
// for all cart discount
// product base coupon7
        }
        elseif($coupon_name->product_id && $coupon_name->discount_type==1){
            $cart_discount=Cart::withSum('variations','sale_price')->where('user_id',Auth::id())->whereHas('variations' , function($query) {
                return $query->where('discount_status', 1);
            })->with('variations' , function($query) {
                return $query->where('discount_status', 1);
            })->get();

            $cart_without_discount=Cart::withSum('variations','regular_price')->where('user_id',Auth::id())->whereHas('variations' , function($query) {
                return $query->where('discount_status',null);
            })->with('variations' , function($query) {
                return $query->where('discount_status',null);
            })->get();
            $quantity_cart_discount=$cart_discount->pluck('quantity')->sum();
            $quantity_no_discount=$cart_without_discount->pluck('quantity')->sum();
        }elseif($coupon_name->product_id){
        }
        if($coupon_name->product_variation_id && $coupon_name->discount_type==2){
            $cart_discount=Cart::withSum('product','sale_price')->where('user_id',Auth::id())->whereIn('product_variantion_id',explode(',',$coupon_name->product_variation_id))->whereHas('product' , function($query) {
                return $query->where('discount_status', 1);
            })->with('product' , function($query) {
                return $query->where('discount_status', 1);
            })->get();

            $cart_without_discount=Cart::withSum('product','price')->where('user_id',Auth::id())->whereIn('product_variantion_id',explode(',',$coupon_name->product_variation_id))->whereHas('variations' , function($query) {
                return $query->where('discount_status',null);
            })->with('product' , function($query) {
                return $query->where('discount_status',null);
            })->get();
            $quantity_cart_discount=$cart_discount->pluck('quantity')->sum();
            $quantity_no_discount=$cart_without_discount->pluck('quantity')->sum();

        }

        $sum_cart_discount=$cart_discount->sum('variations_sum_sale_price');
        $sum_cart_without_discount=$cart_without_discount->sum('variations_sum_regular_price');
        $sum_sale_price = $sum_cart_discount + $sum_cart_without_discount;

        // $sale_price=$quantity_cart_discount*$cart_discount->count();
        // $regular_price=$quantity_no_discount*$cart_without_discount->count();
        if($coupon_name->percentage){
            $coupon_amount=$sum_sale_price*$coupon_name->percentage/100;
        }else{
            $coupon_amount=$coupon_name->coupon_amount;
        }
        $sale_price=$quantity_cart_discount;
        $regular_price=$quantity_no_discount;
        $coupon_apply = $sale_price + $regular_price;
        $whole_coupon_amount= $coupon_apply * $coupon_amount;
        // dd($whole_coupon_amount,$sale_price,$regular_price);
// $cart_discount->sum('')
        $order_coupon=Order::where('coupon_id', $coupon_name->id)->get()->count();
        $order_user_coupon=Order::where('coupon_id', $coupon_name->id)->where('user_id', Auth::id())->get()->count();
        $coupon_email = Coupon::where('coupon_code', $request->coupon_code)->where('status',1)->whereJsonContains('allowed_emails', Auth::user()->email)->exists();
        if($coupon_name){

            if (strtotime($coupon_name->expiry_date) < strtotime(Carbon::now())) {
                return response()->json(['status' => 405,'message' => 'Sorry!, Given coupon code expired!']);
            }if ($coupon_name->discount_type==1 && $coupon_name->minimum_spend<=$request->final_price_hidden && $coupon_name->maximum_spend>=$request->final_price_hidden) {

                return response()->json(['status' => 405,'message' => 'Sorry!,coupon code total amount between min '.$coupon_name->minimum_spend." and max ". $coupon_name->maximum_spend ]);

            }if($order_coupon && $order_coupon>=$coupon_name->usage_limit_per_coupon || $order_user_coupon>=$coupon_name->usage_limit_per_user){
                return response()->json(['status' => 405,'message' => 'Sorry!,coupon code limit has been excessed']);
            }if($coupon_email){
                return response()->json(['status' => 405,'message' => 'Sorry!,coupon code is not valid']);
            }else{
                return response()->json(['status' => 200,'cart' =>$cart_discount,'coupon_amount'=>$coupon_name->coupon_amount,'whole_coupon_amount'=>$whole_coupon_amount,'final_price_hidden'=>$request->final_price_hidden,'cart_regular_price'=>$cart_without_discount]);
            }
        }


    }

    public function shipping(Request $request)
    {

        $user_carts = Cart::where('user_id',Auth::id())->with('get_product.product_shipping')->get();

        if(count($user_carts) == 0){
            $notification = array('message' => 'Please add item(s) to cart, your cart is empty now!', 'alert-type' => 'info');
            return redirect()->route('home')->with($notification);
        }


        if (!Auth::check()) {
            $notification = array('message' => 'Please Login First!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $states = State::all();
        $cities = City::get();

        $cart_count = Cart::where('user_id', Auth::id())->count();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        // $carts = Cart::where('user_id', Auth::id())->with('attrs.products')->get();
        $carts = Cart::where('user_id', Auth::id())->where('cart_id_checkbox','!=','')->with('product','variations')->get();
        $shipping_addresses = UserAddress::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        $defaul_shipping = UserAddress::where('user_id', Auth::id())->where('shipping_active_address', 1)->with('get_city')->first();
        $defaul_billing = UserAddress::where('user_id', Auth::id())->where('billing_active_address', 2)->first();
        $billing_address_count = UserAddress::where('user_id', Auth::id())->where('address_identifire', 2)->count();


        if($defaul_shipping){
            $delivery_fee = MultipleCity::where('city_name', $defaul_shipping->get_city->city)->whereHas('get_shipping_city')->first();
        }


        // // shipping fee by cities
        if(count($user_carts) > 0){

            // shipping ids and fees
            $shipping_ids = array();
            $shipping_fees = array();

            $user_address = UserAddress::where('user_id', Auth::id())->where('shipping_active_address', 1)->first();
            // return $user_shipping_zone_cities = MultipleCity::where('id', $user_address->city)->get();
            foreach($user_carts as $user_cart){
                // shipping id
                array_push($shipping_ids, $user_cart->get_product->product_shipping->id);
                // shipping fee
                // array_push($shipping_fees, $user_cart->get_product->product_shipping->shipping_fee ?? "0");

                // $asort = ['id' => $user_cart->get_product->product_shipping->id, 'shipping_fee' => $user_cart->get_product->product_shipping->shipping_fee ?? "0"];
                // array_push($shipping_fees, $asort);
            }
           // rsort($shipping_fees);
           $user_city = $user_address->city ?? '';
           $user_shippings =  shipping::whereIn('id',$shipping_ids)->with('shipping_city', function($query) use ($user_city){
                $query->where('city_id', $user_city);
           })->whereHas('shipping_city', function($query) use ($user_city){
            $query->where('city_id', $user_city);
       })->orderBy('shipping_fee','desc')->get();


        }




        return view('frontend.checkout', get_defined_vars());
    }

    public function cash_on_delivery(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        if(count($carts) == 0){
            return redirect()->route('shop')->with('empty_cart','Empty cart, try to add item to cart!');
        }



        $carts = Cart::where('user_id', Auth::id())->where('cart_id_checkbox','!=',null)->with('product','variations')->get();
        $shipping_address = UserAddress::where('user_id', Auth::id())->where('shipping_active_address', 1)->first();
        $billing_address = UserAddress::where('user_id', Auth::id())->where('billing_active_address', 2)->first();
        $delivery_fee = session()->has('delivery_fee') ? session()->get('delivery_fee') : 0;
        // order_id get
        $order_id = '';


        $order = new Order();
        $order->order_status = 1;
        $order->user_id = Auth::id();
        if($delivery_fee){
            $order->delivery_fee = $delivery_fee;
            // $order->delivery_fee = $delivery_fee->get_shipping_city->shipping_fee;
        }
        else {
            $order->delivery_fee  = 0;
        }
        $order->payment_method = 1;
        $order->shipping_address = json_encode($shipping_address);
        $order->billing_address = json_encode($billing_address);
        $order->processing_at = Carbon::now();

        // coupon code apply
        if(session()->has('coupon_code')){
            $order->coupon_status = 1;
            // $order->total_price = ($order->total_price) - ($order->total_price * $configuration->coupon_discount / 100);
            $order->total_price = $order->total_price - session()->get('coupon_amount');
        }
        $order->coupon_id = session()->get('id');
        $order->save();

        foreach($carts as $cart){

        $price = null;
        $discounted_price = null;
        $discount = null;
        $total = null;
        if($cart->product->product_type == 1){
            // simple product
            $product = Product::find($cart->product_id);
            // check discount and calculate price
            if ($cart->product->discount_status == null || $cart->product->discount_status == 0){
                    $price = $cart->product->price;
                    $total = $cart->product->price * $cart->quantity;
            }else{
                 $price = $cart->product->price;
                 $discounted_price = $cart->product->sale_price;
                 $total = $cart->product->sale_price * $cart->quantity;
                 $discount = ($price * $cart->quantity) - $total;
            }


        }else{
            // variable products

            $product = ProductVariantion::find($cart->product_variantion_id);
            // check discount and calculate price
            if ($product->discount_status == null || $product->discount_status == 0){
                $price = $product->regular_price;
                $total = $product->regular_price * $cart->quantity;
            }else{
                $price              = $product->regular_price;
                $discounted_price   = $product->sale_price;
                $total              = $product->sale_price  * $cart->quantity;
                $discount           = ( $product->regular_price * $cart->quantity ) - $total;
            }
        }


        // $delivery_fee = MultipleCity::where('city_id', $shipping_address->get_city->city)->with('get_shipping_city')->first();


        // $order = Order::find($cart->order_id);

        $billing = new BillingInfo();
        $billing->order_id = $order->id;
        $billing->product_id = $cart->product_id;
        $billing->product_variantion_id = $cart->product_variantion_id;
        $billing->attributes = $cart->attribute;
        $billing->attribute_values = $cart->attribute_value;
        $billing->quantity = $cart->quantity;
        if($delivery_fee){
            $billing->delivery_fee = $delivery_fee;
            // $billing->delivery_fee = $delivery_fee->get_shipping_city->shipping_fee;
        }
        else {
            $billing->delivery_fee  = 0;
        }
        $billing->discount = $discount;
        $billing->discounted_price = $discounted_price;
        $billing->price = $price;
        $billing->total = $total;
        $billing->shipping_address = json_encode($shipping_address);
        $billing->billing_address = json_encode($billing_address);
        $billing->billing_address = json_encode($billing_address);

        $billing->save();


        $product = Product::find($cart->product_id);
        $product->quantity = $product->quantity - $cart->quantity;
        $product->save();


        $order_id = $cart->order_id;
        $removeCart = Cart::find($cart->id);
        $removeCart->delete();

        }




        if (session()->has('coupon_code')) {
            session()->forget('coupon_code');
        }
        // update work 20
        if (session()->has('coupon_amount')) {
            session()->forget('coupon_amount');
        }

        // for order notes table update work 19
        $order_notes  = new OrderNote();
        $order_notes->order_id = $order->id;
        $order_notes->order_notes_status = 1;
        $order_notes->status_changed_time = Carbon::now();
        $order_notes->save();


        // order notification
        $order_notification = new OrderNotification();
        $order_notification->order_id = $order->id;
        $order_notification->save();

        session()->forget('products_total_amount');
        session()->forget('delivery_fee');


        // ---------------------- Email Invoice -------------------------------------
        $email_user = $order->user->email;
        $order = Order::where('id',$order->id)->with("purchased_items.product")->withSum("purchased_items","price")->first();
            $shipping_address = UserAddress::where('user_id', $order->user_id)->where('shipping_active_address', 1)->first();
            $billing_address = UserAddress::where('user_id', $order->user_id)->where('billing_active_address', 2)->first();
            $user = User::find($order->user_id);
            $delivery_fee = Configuration::find(1);


        Mail::send('frontend.emails.invoice_mail',
            ['order' => $order,'shipping_address' => $shipping_address,'billing_address' =>  $billing_address ,'user' => $email_user],
            function ($message) use ($email_user) {
                $message
                    ->to($email_user, 'Invoice')->subject('Invoice');
            }
        );
        // ----------------------End. Email Invoice -------------------------------------


        return redirect()->route('home')->with('stripe_payment','Transaction Completed Thank you we have received your order');



        return view('frontend.payment-checkout', get_defined_vars());
    }

    public function paypal(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        if(count($carts) == 0){
            return redirect()->route('shop')->with('empty_cart','Empty cart, try to add item to cart!');
        }

        $cart_count = Cart::where('user_id', Auth::id())->count();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        // $total_amount = Cart::where('user_id', Auth::id())->sum('total');

        
        if(!session()->has('products_total_amount')){
            return redirect()->route('shipping');
        }

        $total_amount = session()->get('products_total_amount');
        $defaul_shipping = UserAddress::where('user_id', Auth::id())->where('shipping_active_address', 1)->with('get_city')->first();
        $delivery_fee = MultipleCity::where('city_name', $defaul_shipping->get_city->city)->with('get_shipping_city')->first();





        $user_carts = Cart::where('user_id',Auth::id())->with('get_product.product_shipping')->get();
        $defaul_shipping = UserAddress::where('user_id', Auth::id())->where('shipping_active_address', 1)->with('get_city')->first();
        if($defaul_shipping){
            $delivery_fee = MultipleCity::where('city_name', $defaul_shipping->get_city->city)->whereHas('get_shipping_city')->first();
        }

        // // shipping fee by cities
        if(count($user_carts) > 0){
            // shipping ids and fees
            $shipping_ids = array();
            $shipping_fees = array();
            $user_address = UserAddress::where('user_id', Auth::id())->where('shipping_active_address', 1)->first();
            foreach($user_carts as $user_cart){
                // shipping id
                array_push($shipping_ids, $user_cart->get_product->product_shipping->id);
            }
           // rsort($shipping_fees);
           $user_city = $user_address->city ?? '';
           $user_shippings =  Shipping::whereIn('id',$shipping_ids)->with('shipping_city', function($query) use ($user_city){
                $query->where('city_id', $user_city);
           })->whereHas('shipping_city', function($query) use ($user_city){
            $query->where('city_id', $user_city);
            })->orderBy('shipping_fee','desc')->get();


        }
        // return $user_shippings[0]->shipping_fee;


        return view('frontend.payment-checkout', get_defined_vars());
    }


    public function stripe(Request $request){

        $payment =  session()->get('firstpayment');


        require_once __DIR__.'../../../../../vendor/autoload.php';

        $stripe = new \Stripe\StripeClient('sk_test_51LGnnGEzIQiMqj2YZsToYh6xtyZC8UDdhzxDqYjGuyLVoqT5BtSfippdeVGxayPUYprQgL9Keh6Vv62ZaOn7gYap00ngrgzdVl');

        $stripe_response = json_encode($stripe->events->all(['limit' => 1]));


        $carts = Cart::where('user_id', Auth::id())->where('cart_id_checkbox','!=',null)->with('product','variations')->get();
        $shipping_address = UserAddress::where('user_id', Auth::id())->where('shipping_active_address', 1)->first();
        $billing_address = UserAddress::where('user_id', Auth::id())->where('billing_active_address', 2)->first();
        $delivery_fee = session()->has('delivery_fee') ? session()->get('delivery_fee') : 0;
        // order_id get
        $order_id = '';


        $order = new Order();
        $order->order_status = 1;
        $order->user_id = Auth::id();
        if($delivery_fee){
            $order->delivery_fee = $delivery_fee;
            // $order->delivery_fee = $delivery_fee->get_shipping_city->shipping_fee;
        }
        else {
            $order->delivery_fee  = 0;
        }
        $order->payment_method = 3;
        $order->payment_response = json_encode($stripe_response);
        $order->shipping_address = json_encode($shipping_address);
        $order->billing_address = json_encode($billing_address);
        $order->processing_at = Carbon::now();

        // coupon code apply
        if(session()->has('coupon_code')){
            $order->coupon_status = 1;
            $order->total_price = ($order->total_price) - ($order->total_price * $configuration->coupon_discount / 100);
            $order->total_price = $order->total_price - session()->get('coupon_amount');
        }
        $order->coupon_id = session()->get('id');
        $order->save();

        foreach($carts as $cart){

        $price = null;
        $discounted_price = null;
        $discount = null;
        $total = null;
        if($cart->product->product_type == 1){
            // simple product
            $product = Product::find($cart->product_id);
            // check discount and calculate price
            if ($cart->product->discount_status == null || $cart->product->discount_status == 0){
                    $price = $cart->product->price;
                    $total = $cart->product->price * $cart->quantity;
            }else{
                 $price = $cart->product->price;
                 $discounted_price = $cart->product->sale_price;
                 $total = $cart->product->sale_price * $cart->quantity;
                 $discount = ($price * $cart->quantity) - $total;
            }


        }else{
            // variable products

            $product = ProductVariantion::find($cart->product_variantion_id);
            // check discount and calculate price
            if ($product->discount_status == null || $product->discount_status == 0){
                $price = $product->regular_price;
                $total = $product->regular_price * $cart->quantity;
            }else{
                $price              = $product->regular_price;
                $discounted_price   = $product->sale_price;
                $total              = $product->sale_price  * $cart->quantity;
                $discount           = ( $product->regular_price * $cart->quantity ) - $total;
            }
        }


        // $delivery_fee = MultipleCity::where('city_id', $shipping_address->get_city->city)->with('get_shipping_city')->first();


        // $order = Order::find($cart->order_id);

        $billing = new BillingInfo();
        $billing->order_id = $order->id;
        $billing->product_id = $cart->product_id;
        $billing->product_variantion_id = $cart->product_variantion_id;
        $billing->attributes = $cart->attribute;
        $billing->attribute_values = $cart->attribute_value;
        $billing->quantity = $cart->quantity;
        if($delivery_fee){
            $billing->delivery_fee = $delivery_fee;
            // $billing->delivery_fee = $delivery_fee->get_shipping_city->shipping_fee;
        }
        else {
            $billing->delivery_fee  = 0;
        }
        $billing->discount = $discount;
        $billing->discounted_price = $discounted_price;
        $billing->price = $price;
        $billing->total = $total;
        $billing->shipping_address = json_encode($shipping_address);
        $billing->billing_address = json_encode($billing_address);
        $billing->billing_address = json_encode($billing_address);

        $billing->save();


        $product = Product::find($cart->product_id);
        $product->quantity = $product->quantity - $cart->quantity;
        $product->save();


        $order_id = $cart->order_id;
        $removeCart = Cart::find($cart->id);
        $removeCart->delete();

        }




        if (session()->has('coupon_code')) {
            session()->forget('coupon_code');
        }
        // update work 20
        if (session()->has('coupon_amount')) {
            session()->forget('coupon_amount');
        }

        // for order notes table update work 19
        $order_notes  = new OrderNote();
        $order_notes->order_id = $order->id;
        $order_notes->order_notes_status = 1;
        $order_notes->status_changed_time = Carbon::now();
        $order_notes->save();


        // order notification
        $order_notification = new OrderNotification();
        $order_notification->order_id = $order->id;
        $order_notification->save();

        session()->forget('products_total_amount');
        session()->forget('delivery_fee');


        // ---------------------- Email Invoice -------------------------------------
        // $email_user = $order->user->email;
        // $order = Order::where('id',$order->id)->with("purchased_items.product")->withSum("purchased_items","price")->first();
        //     $shipping_address = UserAddress::where('user_id', $order->user_id)->where('shipping_active_address', 1)->first();
        //     $billing_address = UserAddress::where('user_id', $order->user_id)->where('billing_active_address', 2)->first();
        //     $user = User::find($order->user_id);
        //     $delivery_fee = Configuration::find(1);


        // Mail::send('frontend.emails.invoice_mail',
        //     ['order' => $order,'shipping_address' => $shipping_address,'billing_address' =>  $billing_address ,'user' => $email_user],
        //     function ($message) use ($email_user) {
        //         $message
        //             ->to($email_user, 'Invoice')->subject('Invoice');
        //     }
        // );
        // ----------------------End. Email Invoice -------------------------------------


        return redirect()->route('home')->with('stripe_payment','Transaction Completed Thank you we have received your order');


      }

    public function stripe_fail(Request $request){
        return "Payment Failed";
    }

    public function removewishlist(Request $request, $id)
    {
        $removewishlist = Wishlist::where('id', $id)->first();
        if(!empty($removewishlist)){
            $removewishlist->delete();
        }else {
            $notification = array('message' => 'Wishlist Product Removed Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        $notification = array('message' => 'Wishlist Product Removed Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // public function categorydata(Request $request,$slug){
    //     $category = Product::where('slug',$slug)->get();
    //     return $category;
    // }

    public function categoryproducts(Request $request, $slug)
    {

        $cart_count = Cart::where('user_id', Auth::id())->count();
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $shop  = Banner::where('section_name', 'shop')->first();
        $category = SubCategory::where('slug', $slug)->first();
        $products_category = product::where('slug', '!=', '')->where('sub_category_id', $category->id)->with('get_ratings')->withAvg('get_ratings', 'reviews')->get();
        $products_category_count = product::where('slug', '!=', '')->where('sub_category_id', $category->id)->count();
        $sub_categories = SubCategory::where('status',1)->get();
        return view('frontend.categories_products', get_defined_vars());

    }



    public function change_address(Request $request)
    {

        $user_addresses = UserAddress::where('user_id', Auth::id())->get();


        // return $request->all();
        if (count($user_addresses) > 0) {
            foreach ($user_addresses as $user_addresse) {
                $user_addr = UserAddress::find($user_addresse->id);

                if ($request->shipping == 1) {

                    $user_addr->shipping_active_address = null;
                }



                if ($request->billing == 2) {
                    $user_addr->billing_active_address = null;
                }



                $user_addr->save();
            }
        }




        // dd($request->all());
        $user_address = UserAddress::find($request->address_id);

        if ($request->shipping == 1) {

            $user_address->shipping_active_address = $request->shipping;
        }



        if ($request->billing == 2) {
            $user_address->billing_active_address = 2;
        }
        $user_address->save();



        return back();
    }



    public function fetchcities(Request $request)
    {

        $data['states'] = City::where("state_id",$request->country_id)->get(["city", "id"]);
        return response()->json($data);
    }


    public function sidebarcategories(Request $request){

        $id  = $request->cat_id;
        $nav_cat  =  ParentCategory::where('id', $id)->with('get_main_cat','get_sub_cat')->first();
        return response()->json([
            'status' => 200,
            'nav_cat' => $nav_cat
        ]);
    }
}
