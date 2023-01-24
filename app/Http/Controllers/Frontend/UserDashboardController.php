<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BillingInfo;
use Illuminate\Http\Request;
use App\Models\Frontend\City;
use App\Models\Frontend\State;
use App\Models\ProductVariantion;
use App\Models\FrontendModels\Cart;
use App\Http\Controllers\Controller;
use App\Models\BackendModels\Social;
use App\Models\FrontendModels\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Models\BackendModels\Product;
use App\Models\FrontendModels\Review;
use App\Models\BackendModels\Shipping;
use App\Models\FrontendModels\Wishlist;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\BackendModels\Cancellation;
use App\Models\BackendModels\MultipleCity;
use App\Models\FrontendModels\UserAddress;
use App\Models\BackendModels\Configuration;
use App\Models\FrontendModels\Subscription;
use App\Models\BackendModels\ParentCategory;
use App\Models\FrontendModels\OtpVerification;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $config = Configuration::first();
        $social = Social::first();
        $main = ParentCategory::with('get_main_cat', 'get_sub_cat')->where('status', 1)->get();
        view::share(get_defined_vars());
    }
    public function userdashboard()
    {
        if (Auth::check()) {
            $states = State::all();
            $cities = City::get();
            $shipping = UserAddress::where('user_id', Auth::id())->where('default_shipping', 1)->latest()->first();
            $billing = UserAddress::where('user_id', Auth::id())->where('default_billing', 2)->latest()->first();
            $wishlist = Wishlist::where('user_id', Auth::id())->count();
            $getwishlist = Wishlist::where('user_id', Auth::id())->with('get_product_name')->get();
            $cart_count = Cart::where('user_id', Auth::id())->count();
            $orders = Order::where('user_id', Auth::id())->with('carts')->with('purchased_items_billing.product', 'purchased_items_billing.variations')->get();


            // return $orders;
            // foreach ( $orders as $order) {
            //     foreach($order->purchased_items as $val){
            //         return $val;
            //     }
            // }


            $reviews = Review::where('user_id', Auth::id())->with('variations', 'get_product', 'reviews_items')->get();
            $to_pay_count = Order::where('user_id', Auth::id())->where('order_status', null)->with('carts')->has('carts', '!=', '')->count();
            $shipping_count = Order::where('user_id', Auth::id())->where('order_status', 2)->count();
            $delivered = Order::where('user_id', Auth::id())->where('order_status', 3)->count();

            $not_reviewed = Order::where('user_id', Auth::id())->with('purchased_items.product', 'purchased_items.variations', 'reviews_items')->get();

            $shipping_addresses = UserAddress::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
            $cancellation_policy  = Cancellation::where('status', 1)->get();
            $policy  = Cancellation::first();


            $user = User::where('id', Auth::id())->first();
            $subscription_list = Subscription::where('email', $user->email)->first();


            $shipping_condtion = UserAddress::where('user_id', '=', Auth::id())->where('default_shipping', 1)->orwhere('default_billing', 2)->first();

            // $billing_condtion = UserAddress::where('user_id', '=', Auth::id())->where('default_billing', 2)->first();


            return view('user-dashboard.dashboard', get_defined_vars());
        }
        return back();
    }
    public function security()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return view('user-dashboard.security', get_defined_vars());
    }
    public function emailverify()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->count();
        $cart_count = Cart::where('user_id', Auth::id())->count();
        $user_email =  User::where('id', Auth::id())->first();
        return view('user-dashboard.email-verification', get_defined_vars());
    }
    public function updatedauser(Request $request)
    {

        // $this->validate($request, [
        //     'village' => 'required',
        //     'city' => 'required',
        //     'province' => 'required',
        //     'contact' => 'required|max:20',
        //     'address' => 'required|max:150',
        //     'name' => 'required|max:100',
        // ]);

        $validator = Validator::make($request->all(), [
            // 'default_shipping' => 'required',
            // 'delivery_lable' => 'required',
            'city' => 'required',
            'province' => 'required',
            'landmark' => 'required|max:100',
            'contact' => 'required|max:20',
            'address' => 'required|max:150',
            'name' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }

        // return request()->all();

        // for add form
        // if($request->form_type == 'add_form'){
        //     return "add_form";
        // }


        // // for edit form
        // if($request->form_type == 'edit_form'){
        //     return "edit_form";
        // }

        // return "1";



        $user_shipping_address_count = UserAddress::where('user_id', Auth::id())->where('default_shipping', 1)->get()->count();
        $user_billing_address_count = UserAddress::where('user_id', Auth::id())->where('default_billing', 2)->get()->count();
        $user_addresses = UserAddress::where('user_id', Auth::id())->get();
        if (!empty($user_addresses)) {
            foreach ($user_addresses as $user_addresse) {
                $user_addr = UserAddress::find($user_addresse->id);
                // $user_addr->shipping_active_address = null;
                // $user_addr->billing_active_address = null;



                if ($request->default_shipping == 1) {

                    if ($user_addr->default_shipping == 1 && $user_addr->default_billing == 2) {

                        if($request->default_shipping == 1 && empty($request->default_billing)){
                            $user_addr->shipping_active_address = null;
                            $user_addr->default_shipping = null;
                        }else{
                            $user_addr->billing_active_address = null;
                            $user_addr->default_billing = null;
                        }


                    }


                    if($user_shipping_address_count >= 1){
                        $user_addr->shipping_active_address = null;
                        $user_addr->default_shipping = null;
                    }
                }

                if ($request->default_billing == 2) {

                    if ($user_addr->default_shipping == 1 && $user_addr->default_billing == 2) {

                        if($request->default_shipping == 1 && empty($request->default_billing)){
                            $user_addr->shipping_active_address = null;
                            $user_addr->default_shipping = null;
                        }else{
                            $user_addr->billing_active_address = null;
                            $user_addr->default_billing = null;
                        }


                    }


                    if($user_billing_address_count >= 1){
                        $user_addr->billing_active_address = null;
                        $user_addr->default_billing = null;
                    }
                }



                if ($request->default_shipping == 1 && $request->default_billing == 2) {

                        $user_addr->shipping_active_address = null;
                        $user_addr->default_shipping = null;
                        $user_addr->billing_active_address = null;
                        $user_addr->default_billing = null;
                }
                // $user_addr->default_billing = null;
                // $user_addr->billing_active_address = null;
                // $user_addr->address_identifire = null;


                // if($request->default_shipping == 1){
                //     $user_addr->default_shipping = null;
                //     $user_addr->shipping_active_address = null;
                // }

                $user_addr->save();
            }
        }

        // return $request->all();
        $user = new UserAddress();
        $user->user_id = Auth::id();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->landmark = $request->landmark;
        $user->province = $request->province;
        $user->delivery_label = $request->delivery_lable;
        $user->city = $request->city;
        // $user->village = $request->village;
        $user->contact = $request->contact;



        if (!empty($user->default_shipping)) {
            $user->address_identifire = 1;
        } else {
            $user->address_identifire = 2;
        }


        // $user->shipping_active_address = 1;
        // $user->billing_active_address = 2;
        if ($request->default_shipping == 1) {
            $user->shipping_active_address = 1;
            $user->default_shipping = $request->default_shipping;
        }

        if ($request->default_billing == 2) {
            $user->billing_active_address = 2;
            $user->default_billing = $request->default_billing;
        }

        $user->save();

        // $notification = array('message' => 'Address Updated Successfully! ', 'alert-type' => 'success');
        // return redirect()->route('dashboard')->with($notification);
        return response()->json(['status' => 200, 'message' => 'Address Updated Successfully!']);
    }

    public function user_address(Request $request, $id)
    {
        $user_address = UserAddress::find($id);
        return response()->json([
            'user_address' => $user_address
        ]);
    }

    public function update_address(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'city' => 'required',
            'province' => 'required',
            'landmark' => 'required|max:100',
            'contact' => 'required|max:20',
            'address' => 'required|max:150',
            'name' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        }

        // return $request->delivery_lable;
        $user_addresses = UserAddress::where('user_id', Auth::id())->get();
        if (!empty($user_addresses)) {
            foreach ($user_addresses as $user_addresse) {
                $user_addr = UserAddress::find($user_addresse->id);





                $user_addr->address_identifire = null;


                if ($request->default_shipping == 1) {
                    $user_addr->default_shipping = null;
                    $user_addr->shipping_active_address = null;
                }

                if (!empty($user_addr->default_billing) && !empty($user_addr->billing_active_address)) {

                    if (!empty($request->default_billing)) {
                        $user_addr->default_billing = null;
                        $user_addr->billing_active_address = null;
                    }
                }





                // if ($request->default_shipping == 1) {
                //     $user_addr->shipping_active_address = null;
                // }

                // if ($request->default_billing == 2) {
                //     $user_addr->billing_active_address = null;
                // }


                // if ($user_addr->default_shipping == 1 && $user_addr->default_billing == 2) {
                //     $user_addr->address_identifire = 1;
                //     $user_addr->shipping_active_address = 1;
                //     $user_addr->billing_active_address = 2;

                // } else {

                //     if ($user_addr->default_shipping == 1) {
                //         $user_addr->shipping_active_address = 1;
                //     }

                //     if ($user_addr->default_billing == 2) {
                //         $user_addr->billing_active_address = 2;
                //     }

                // }



                $user_addr->save();
            }
        }



        $user_address = UserAddress::find($request->address_id);

        $user_address->name = $request->name;
        $user_address->address = $request->address;
        $user_address->contact = $request->contact;
        $user_address->landmark = $request->landmark;
        $user_address->province = $request->province;
        $user_address->delivery_label = $request->delivery_lable;
        $user_address->city = $request->city;
        $user_address->default_shipping = $request->default_shipping ?? null;
        $user_address->default_billing = $request->default_billing ?? null;



        if ($request->default_shipping == 1 && $request->default_billing == 2) {
            $user_address->address_identifire = 1;
            $user_address->shipping_active_address = 1;
            $user_address->billing_active_address = 2;
        } else {

            if ($request->default_shipping == 1) {
                $user_address->shipping_active_address = 1;
            }

            if ($request->default_billing == 2) {
                $user_address->billing_active_address = 2;
            }
        }


        $user_address->save();



        // dd($request->all(),$user_address);
        return response()->json([
            'status' => 200,
            'message' => 'Address has been updated!',
        ]);
    }

    public function userprofile(Request $request)
    {
        $this->validate($request, [
            'gender' => 'required',
            'year' => 'required|numeric',
            'day' => 'required|numeric',
            'month' => 'required|numeric',
            'email' => 'required|max:80',
            'name' => 'required|max:50',
        ]);

        $user = User::where('id', Auth::id())->first();
        $today = Carbon::now();
        $user->year =  $request->year;
        $diff =   $today->year - $request->year;
        // return $diff;
        if ($diff > 18) {
            $user->name = $request->name;
            $user->contact = $request->contact;
            $user->day = $request->day;
            $user->month = $request->month;

            $user->gender = $request->gender;
            $user->save();
            $notification = array('message' => 'Profile Updated Successfully! ', 'alert-type' => 'success');
            return redirect()->route('dashboard')->with($notification);
        } else {
            $notification = array('message' => 'User is under 18 ! ', 'alert-type' => 'error');
            return redirect()->route('dashboard')->with($notification);
        }
    }
    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required_with:confirm_password|same:confirm_password|min:8',
            'current_password' => 'required',
        ]);
        // return $request->all();
        $user = User::where('id', Auth::id())->first();
        if (Hash::check($request->get('current_password'),  $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            $notification = array('message' => 'Password Updated Successfully ! ', 'alert-type' => 'success');
            return redirect()->route('dashboard')->with($notification);
        } else {
            $notification = array('message' => 'Current Password is incorrect ! ', 'alert-type' => 'error');
            return redirect()->route('dashboard')->with($notification);
        }

        // return $request->all();
    }
    public function usersubscription(Request $request)
    {

        $subscription = new Subscription();
        $user = User::where('id', Auth::id())->first();
        $check = Subscription::where('email', $user->email)->first();
        if ($check) {
            $notification = array('message' => 'You have already subscribed for our news letters ! ', 'alert-type' => 'error');
            return redirect()->route('dashboard')->with($notification);
        } else {
            $email = $user->email;
            $subscription->email =   $email;
            $subscription->status = 1;
            $subscription->save();
        }


        $data = [
            'email' => $email,
        ];
        $emailadmin = 'djoy62471@gmail.com';
        Mail::send(
            'frontend.emails.subscription_mail',
            ['data' => $data],
            function ($message) use ($emailadmin) {
                $message
                    ->to($emailadmin, 'admin')->subject('Subscription');
            }
        );
        $emailuser  = $email;
        Mail::send(
            'frontend.emails.subscription_mail',
            ['data' => $data],
            function ($message) use ($emailuser) {
                $message
                    ->to($emailuser, 'user')->subject('Subscription');
            }
        );

        $notification = array('message' => 'You have successfully subscribed for our news letters ! ', 'alert-type' => 'success');
        return redirect()->route('dashboard')->with($notification);
    }

    public function cancelsubscription(Request  $request)
    {
        $subscription_cancel_id = $request->id;
        $subscription_cancel = Subscription::find($subscription_cancel_id);
        $subscription_cancel->delete();
        $notification = array('message' => 'You have successfully unsubscribed for our news letters ! ', 'alert-type' => 'success');
        return redirect()->route('dashboard')->with($notification);
    }

    public function verifymobile(Request $request)
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
                'status' => 501,
                'message' => 'Invalid Email'
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
        }
        $user_check = User::where('email', $request->email)->first();
        if (!$user_check) {
            return response()->json([
                'status' => 501,
                'message' => 'Invalid Email'
            ]);
        } else {
            $otp_email = new OtpVerification();
            $otp_email->email = $request->email;
            $otp_email->otp = $random;
            $otp_email->save();
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
            $otp_email->save();
            return response()->json([
                'status' => 200,
                'message' => 'OTP Sent'
            ]);
        }
    }


    public function verifymobileotp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'verify_code' => 'required|max:8',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $otp_check = OtpVerification::where('email', $request->email)->latest()->first();
            if (empty($otp_check->email)) {
                return response()->json([
                    'status' => 319,
                    'email' => 'Incorrect Email or OTP'
                ]);
            }
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

    public function changeemail()
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())->count();
            $cart_count = Cart::where('user_id', Auth::id())->count();
            return view('user-dashboard.phone', get_defined_vars());
        } else {
            return back();
        }
    }
    public function storemobile(Request $request)
    {
        // $this->validate($request, [
        //     'contact' => 'required|max:20',
        //     'current_contact' => 'required|max:20',
        // ]);
        $user = User::where('id', Auth::id())->first();
        $user->email = $request->email;
        $user->update();
        $notification = array('message' => 'Your email has been changed Successfully! ', 'alert-type' => 'success');
        return redirect()->route('dashboard')->with($notification);

        // if ($user->contact == $request->current_contact) {
        //     $user->contact = $request->contact;
        //     $user->update();
        //     $notification = array('message' => 'Phone Number Changed Successfully ! ', 'alert-type' => 'success');
        //     return redirect()->route('dashboard')->with($notification);
        // } else {
        //     $notification = array('message' => 'Invalid Current Phone ! ', 'alert-type' => 'error');
        //     return back()->with($notification);
        // }
    }
    public function userlogout()
    {
        Session::flush();
        Auth::logout();
        $notification = array('message' => 'Logout Successfully ! ', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);
    }

    public function fetchState(Request $request)
    {

        $data['states'] = City::where("state_id", $request->country_id)->get(["city", "id"]);
        return response()->json($data);
    }


    public function storereviews(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'comments' => 'required|max:500',
            'reviews' => 'required|max:20',
        ]);
        $review  = new Review();
        $review->user_id = Auth::id();
        $review->name = Auth::user()->name;
        $review->product_id = $request->product_id;
        $review->order_id = $request->order_id;
        $review->product_variation_id = $request->product_variation_id;
        $review->reviews = $request->reviews;
        $review->comments = $request->comments;
        $review->status = 0;
        $images = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('reviews'), $name);
                $images[] = $name;
            }
        }
        $review->image = json_encode($images);
        $review->save();
        $notification = array('message' => 'Your Review is pending from admin side !', 'alert-type' => 'success');
        return redirect()->route('dashboard')->with($notification);
    }



    public function order_cancel(Request $request)
    {


        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'policy' => 'required',
            'comment' => 'required',
            'reason' => 'required',
            'cancelproduct' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors()->all()]);
        }



        // dd($request->cancel_order_id);
        // dd($request->all());

        if ($request->cancellation_policy) {
            $status  = BillingInfo::where('order_id', $request->cancellation_policy)->get();
            // dd($status);
            foreach ($status as $val) {
                $val->order_status = 2;
                $val->cancellation_reason =  $request->reason;
                $val->cancelled_at = Carbon::now();
                $val->cancellation_comments = $request->comment;
                $val->save();
            }

            $order = Order::find($request->cancellation_policy);
            $order->order_status = 4;
            $order->cancel_order_count = 1;
            $order->order_status = 7;
            $order->comment = $request->comment;
            $order->order_cancellation_reason = $request->all();

            if ($order->save()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Order request for cancellation has been sent sucessfully!',

                ]);
            } else {
                return response()->json([
                    'message' => 'Oops!, something went wrong!',
                ]);
            }
        } else {
            for ($i = 0; $i < count($request->cancelproduct); $i++) {

                $bill_info = BillingInfo::find($request->cancelproduct[$i]);
                $bill_info->order_status = 2;
                $bill_info->cancellation_reason =  $request->reason;
                $bill_info->cancelled_at = Carbon::now();
                $bill_info->cancellation_comments = $request->comment;
                $bill_info->save();


                $order = Order::find($bill_info->order_id);
                $order->cancel_order_count = 1;
                $order->order_status = 7;
                $order->comment = $request->comment;
                $order->order_cancellation_reason = $request->all();
                $order->save();
            }
            return response()->json([
                'status' => 200,
                'message' => 'Order request for cancellation has been sent sucessfully!',

            ]);
        }
    }

    public function order_tracking(Request $request)
    {
        // update work 10

        $order = Order::where('id', $request->order_id)->with("purchased_items", 'purchased_items.product', 'purchased_items.variations')->withSum("purchased_items", "price")->first();
        $shipping_address = UserAddress::where('user_id', $order->user_id)->where('shipping_active_address', 1)->first();
        $billing_address = UserAddress::where('user_id', $order->user_id)->where('billing_active_address', 2)->first();
        $user = User::find($order->user_id);
        $delivery_fee = Configuration::find(1);

        $payment_method = '';

        if ($order->payment_method == 2) {
            $payment_method = 'Paypal';
        }
        if ($order->payment_method == 3) {
            $payment_method = 'Stripe';
        }



        $cancelitmes = [];
        $purchased_items = [];
        $total_amount = 0;
        $total_discount = 0;
        $cancelproductamount = 0;
        $canceldiscount = 0;
        foreach ($order->purchased_items as $item) {
            $product = Product::find($item->product_id);

            $arr = [];
            // $arr['product_name'] = $product->product_name;
            $arr['qty'] = $item->quantity;

            // checking discounts
            if ($item->discounted_price == null) {
                $arr['price'] = number_format($item->price, 2);
                $arr['total'] = number_format($item->total, 2);
                $total_amount += $item->total;
            } else {
                $arr['price'] = number_format($item->discounted_price, 2);
                $arr['total'] = number_format($item->total, 2);
                $total_amount += $item->total;
                $total_discount += $item->discount;
            }
            array_push($purchased_items, $arr);

            if ($item->order_status == 2 || $item->order_status == 3) {
                if ($item->cancel_discounted_price == null) {
                    $arr['cancelprice'] = number_format($item->price, 2);
                    $arr['canceltotal'] = number_format($item->total, 2);
                    $cancelproductamount += $item->total;
                } else {
                    $arr['cancelprice'] = number_format($item->discounted_price, 2);
                    $arr['canceltotal'] = number_format($item->total, 2);
                    $cancelproductamount += $item->total;
                    $canceldiscount += $item->discount;
                }
            }


            array_push($cancelitmes, $arr);
            // return dd($arr);

        }

        return response()->json([
            'user' => $user,
            'order' => $order,
            'purchased_items_sum_price' => number_format($total_amount, 2),
            'cancel_item_sum_price' => number_format($total_amount - $cancelproductamount, 2),
            'delivery_fee' => number_format($delivery_fee->shipping_fee, 2),
            'total' => number_format($total_amount + $delivery_fee->shipping_fee, 2),
            'canceltotal' => number_format($total_amount - $cancelproductamount + $delivery_fee->shipping_fee, 2),
            'created_at' => date('d/M/Y', strtotime($order->created_at)),
            'shipping_address' => $shipping_address,
            'billing_address' => $billing_address,
            'payment_method' => $payment_method,
            'processing_at' =>  date('d M Y - G:i', strtotime($order->processing_at)),
            'shipped_at' =>  date('d M Y - G:i', strtotime($order->shipped_at)),
            'delivered_at' =>  date('d M Y - G:i', strtotime($order->delivered_at)),
            'cancelled_at' =>  date('d M Y - G:i', strtotime($order->cancelled_at)),
            'verified_at' =>  date('d M Y - G:i', strtotime($order->verified_at)),

        ]);
    }



    public function order_verification(Request $request)
    {
        $order = Order::find($request->orderId);
        $order->order_verification = 1;
        $order->verified_at = Carbon::now();

        if ($order->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Order Verified!, Thank You',
                'order' => $order,
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Oops, Order not verify!, Something went wrong!',
            ]);
        }
    }



    public function order_details(Request $request)
    {
        // update work 10
        $order_status = $request->order_status;


        $order = Order::where('id', $request->orderId)->with("purchased_items", 'purchased_items.product', 'purchased_items.variations')->withSum("purchased_items", "price")->first();
        $shipping_address = UserAddress::where('user_id', $order->user_id)->where('shipping_active_address', 1)->first();
        $billing_address = UserAddress::where('user_id', $order->user_id)->where('billing_active_address', 2)->first();
        $user = User::find($order->user_id);
        $delivery_fee = $order->delivery_fee ?? 0;
        // return $user_shippings[0]->shipping_fee;
        // shipping fee according to user city




        $payment_method = '';

        if ($order->payment_method == 2) {
            $payment_method = 'Paypal';
        }
        if ($order->payment_method == 3) {
            $payment_method = 'Stripe';
        }

        $cancelitmes = [];
        $purchased_items = [];
        $total_amount = 0;
        $total_discount = 0;
        $cancelproductamount = 0;
        $canceldiscount = 0;
        foreach ($order->purchased_items as $item) {
            $product = Product::find($item->product_id);

            $arr = [];
            $arr['product_name'] = $product->product_name;
            $arr['qty'] = $item->quantity;

            // checking discounts
            if ($item->discounted_price == null) {
                $arr['price'] = number_format($item->price, 2);
                $arr['total'] = number_format($item->total, 2);
                $total_amount += $item->total;
            } else {
                $arr['price'] = number_format($item->discounted_price, 2);
                $arr['total'] = number_format($item->total, 2);
                $total_amount += $item->total;
                $total_discount += $item->discount;
            }
            array_push($purchased_items, $arr);


            if ($item->order_status == 2 || $item->order_status == 3) {
                if ($item->cancel_discounted_price == null) {
                    $arr['cancelprice'] = number_format($item->price, 2);
                    $arr['canceltotal'] = number_format($item->total, 2);
                    $cancelproductamount += $item->total;
                } else {
                    $arr['cancelprice'] = number_format($item->discounted_price, 2);
                    $arr['canceltotal'] = number_format($item->total, 2);
                    $cancelproductamount += $item->total;
                    $canceldiscount += $item->discount;
                }
            }


            array_push($cancelitmes, $arr);


            // return dd($arr);

        }
        // return $purchased_items;
        return response()->json([
            'user' => $user,
            'order' => $order,
            'purchased_items_sum_price' => number_format($total_amount, 2),
            'cancel_item_sum_price' => number_format($total_amount - $cancelproductamount, 2),
            // 'delivery_fee' => number_format($delivery_fee->shipping_fee, 2),
            'delivery_fee' => number_format($order->delivery_fee, 2),
            'total' => number_format($total_amount + $delivery_fee, 2),
            'canceltotal' => number_format($total_amount - $cancelproductamount + $delivery_fee, 2),
            'total_discount' => number_format($total_discount, 2),
            'created_at' => date('d/M/Y', strtotime($order->created_at)),
            'shipping_address' => $shipping_address,
            'billing_address' => $billing_address,
            'payment_method' => $payment_method,
            'processing_at' =>  date('d M Y - G:i', strtotime($order->processing_at)),
            'shipped_at' =>  date('d M Y - G:i', strtotime($order->shipped_at)),
            'delivered_at' =>  date('d M Y - G:i', strtotime($order->delivered_at)),
            'cancelled_at' =>  date('d M Y - G:i', strtotime($order->cancelled_at)),
            'verified_at' =>  date('d M Y - G:i', strtotime($order->verified_at)),
            'purchased_items' => $purchased_items,
            'order_status' => $order_status
        ]);
    }



    public function orders_filter(Request $request)
    {


        $query = Order::where('user_id', Auth::id())->with('order_status', '!=', null);
        if ($request->filter == 1) {
            // last 5 orders
            $query->orderBy('id', 'desc')->limit(5);
        }
        if ($request->filter == 2) {
            // last 15 days
            $query->where('created_at', '>=', Carbon::now()->subDays(15));
        }
        if ($request->filter == 3) {
            // last 30 days
            $query->where('created_at', '>=', Carbon::now()->subDays(30));
        }
        if ($request->filter == 4) {
            // last 6 months
            $query->where('created_at', '>=', Carbon::now()->subDays(30 * 6));
        }
        if ($request->filter == 5) {
            // orders 2022 year
            $query->where('created_at', 'like', '%' . now()->format('Y') . '%');
        }

        $orders = $query->get();
        // return $orders;
        if (count($orders) > 0) {
            return view('user-dashboard.partials.filters', get_defined_vars())->render();
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }


    public function getreviewproduct(Request $request)
    {
        // dd($request->all());
        $id = $request->review_id;
        $info = BillingInfo::with('product', 'variations')->where('id', $id)->first();
        return response()->json([
            'status' => 200,
            'info' => $info
        ]);
    }


    public function editreview(Request $request)
    {
        // dd($request->all());
        $id = $request->edit_review;
        $edit_review = Review::where('id', $id)->with('variations', 'get_product')->first();
        $ratings = $edit_review->reviews;
        // dd($ratings);
        return response()->json([
            'status' => 200,
            'edit_review' => $edit_review,
            'ratings' => $ratings,
        ]);
        // dd($edit_review);
    }



    public function updatereview(Request $request)
    {
        $this->validate($request, [
            'comments' => 'required|max:500',
            'reviews' => 'required|max:20',
        ]);
        if ($request->rating_id) {
            $id  = $request->rating_id;
            $update_review = Review::where('id', $id)->first();
            $update_review->user_id = Auth::id();
            $update_review->name = Auth::user()->name;
            $update_review->product_id = $request->product_id;
            $update_review->reviews = $request->reviews;
            $update_review->comments = $request->comments;
            $update_review->status = 0;
            $images = [];
            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $file) {
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('reviews'), $name);
                    $images[] = $name;
                }
            }
            $update_review->image = json_encode($images);
            $update_review->save();
            $notification = array('message' => 'Your Review is pending from admin side !', 'alert-type' => 'success');
            return redirect()->route('dashboard')->with($notification);
        } else {
            $review  = new Review();
            $review->user_id = Auth::id();
            $review->name = Auth::user()->name;
            $review->product_id = $request->product_id;
            $review->reviews = $request->reviews;
            $review->comments = $request->comments;
            $review->status = 0;
            $images = [];
            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $file) {
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('reviews'), $name);
                    $images[] = $name;
                }
            }
            $review->image = json_encode($images);
            $review->save();
            $notification = array('message' => 'Your Review is pending from admin side !', 'alert-type' => 'success');
            return redirect()->route('dashboard')->with($notification);
        }
    }



    public function ordercancellation(Request $request)
    {

        $id = $request->order_id;
        $cancellation = Order::where('id', $id)->with('user', 'purchased_items.product', 'purchased_items.variations')->first();
        // dd($cancellation);
        return response()->json([
            'status' => 200,
            'cancellation' =>  $cancellation
        ]);
    }

    // update work 13

    public function refundorderrequest(Request $request)
    {

        // dd($request->all());
        $id = $request->order_id;
        $refund = Order::where('id', $id)->with('user', 'purchased_items.product', 'purchased_items.variations')->first();
        // dd($cancellation);
        return response()->json([
            'status' => 200,
            'refund' =>  $refund
        ]);
    }

    public function refundorder(Request $request)
    {


        // return $request->all();

        $this->validate($request, [
            'refundproduct' => 'required',
            'refunded_policy' => 'required',
            'comment' => 'required',
            'reason' => 'required',
        ]);



        // return $request->all();
        if ($request->refund_policy) {
            $status  = BillingInfo::where('order_id', $request->refund_policy)->get();
            // dd($status);
            $images = [];
            if ($request->hasfile('cancellation_image')) {
                foreach ($request->file('cancellation_image') as $file) {
                    // return $file;
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    // return $name;
                    $file->move(public_path('cancellation_image'), $name);
                    $images[] = $name;
                }
            }
            foreach ($status as $val) {
                $val->order_status = 3;
                $val->cancellation_reason =  $request->reason;
                $val->cancelled_at = Carbon::now();
                $val->cancellation_comments = $request->comment;
                $val->cancellation_image = json_encode($images);
                $val->save();
            }

            // update work 16

            // end update work 16
            $order = Order::find($request->refund_policy);
            $order->order_status = 4;
            $order->cancel_order_count = 2;
            $order->order_status = 8;
            $order->comment = $request->comment;
            $order->order_cancellation_reason = $request->all();
            $order->save();
            $notification = array('message' => 'Refund request has been sent successfully !', 'alert-type' => 'success');
            return redirect()->route('dashboard')->with($notification);
        } else {
            $images = [];
            if ($request->hasfile('cancellation_image')) {
                foreach ($request->file('cancellation_image') as $file) {
                    // return $file;
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    // return $name;
                    $file->move(public_path('cancellation_image'), $name);
                    $images[] = $name;
                }
            }
            for ($i = 0; $i < count($request->refundproduct); $i++) {

                $products = BillingInfo::find($request->refundproduct[$i]);
                $products->order_status = 3;
                $products->cancellation_reason =  $request->reason;
                $products->cancelled_at = Carbon::now();
                $products->cancellation_comments = $request->comment;
                $products->cancellation_image = json_encode($images);
                $products->save();


                $order = Order::find($products->order_id);
                $order->order_status = 4;
                $order->cancel_order_count = 2;
                $order->order_status = 8;
                $order->comment = $request->comment;
                $order->order_cancellation_reason = $request->all();
                $order->save();
            }
            $notification = array('message' => 'Refund request has been sent successfully !', 'alert-type' => 'success');
            return redirect()->route('dashboard')->with($notification);
        }
    }
    // $check  = BillingInfo::where('id',$request->refundproduct)->get();
    // return $check;

    // }
    // return $check;
    // if ($check == null) {
    //     $product  =  BillingInfo::where('product_id', $request->refundproduct)->where('order_id', $request->refund_order_id)->first();
    //     // dd($product);
    //     $product->order_status = 3;
    //     $images = [];
    //     if($request->hasfile('cancellation_image'))
    //     {
    //         foreach($request->file('cancellation_image') as $file)
    //         {
    //             $name = time().rand(1,100).'.'.$file->extension();
    //             $file->move(public_path('cancellation_image'), $name);
    //             $images[] = $name;
    //         }
    //     }
    //     $product->cancellation_image = json_encode($images);
    //     $product->cancelled_at = Carbon::now();
    //     $product->cancellation_reason =  $request->reason;
    //     $product->cancellation_comments = $request->comment;
    //     $product->save();

    //     $order = Order::find($product->order_id)->first();
    //     $order->cancel_order_count = 2;
    //     $order->order_status = 8;
    //     $order->save();

    //     $notification = array('message' => 'Refund request has been sent successfully !', 'alert-type' => 'success');
    //     return redirect()->route('dashboard')->with($notification);
    // } else {
    //     $cancel = BillingInfo::where('product_id', $request->refund_product_id)->where('order_id', $request->refund_order_id)->where('product_variantion_id', $request->refundproduct)->first();
    //     // return $cancel;
    //     // dd($cancel->order_id);
    //     $images = [];
    //     if($request->hasfile('cancellation_image'))
    //     {
    //         foreach($request->file('cancellation_image') as $file)
    //         {
    //             $name = time().rand(1,100).'.'.$file->extension();
    //             $file->move(public_path('cancellation_image'), $name);
    //             $images[] = $name;
    //         }
    //     }
    //     $cancel->cancellation_image = json_encode($images);
    //     $cancel->order_status = 3;
    //     $cancel->cancelled_at = Carbon::now();
    //     $cancel->cancellation_reason =  $request->reason;
    //     $cancel->cancellation_comments = $request->comment;
    //     $cancel->save();

    //     $order = Order::where('id',$cancel->order_id)->first();
    //     // dd($order->id);
    //     $order->cancel_order_count = 2;
    //     $order->order_status = 8;
    //     $order->save();

    //     $notification = array('message' => 'Refund request has been sent successfully !', 'alert-type' => 'success');
    //     return redirect()->route('dashboard')->with($notification);
    // }
    // }


    // update work 13


    public function ordercanceldata(Request $request)
    {
        $check_orders = Order::where('cancel_order_count', '=', 1)->with('purchased_items', function ($query) {
            $query->where('order_status', 2);
        })->get();
        return response()->json([
            'check_orders' => $check_orders
        ]);
    }

    public function refunddata(Request $request)
    {
        $refund_orders = Order::where('cancel_order_count', '=', 2)->with('purchased_items', function ($query) {
            $query->where('order_status', 3);
        })->get();
        return response()->json([
            'refund_orders' => $refund_orders
        ]);
    }

    public function getrefundall(Request $request)
    {
        $id = $request->order_id;

        $allrefund = BillingInfo::where('order_id', $id)->where('order_status', 3)->with('product')->with('variations')->with('get_reason')->get();

        // return $allcancelled;
        return response()->json([
            'allrefund' => $allrefund
        ]);
    }

    public function getcancelledall(Request $request)
    {
        $id = $request->order_id;

        $allcancelled = BillingInfo::where('order_id', $id)->where('order_status', 2)->with('product')->with('variations')->with('get_reason')->get();

        // return $allcancelled;
        return response()->json([
            'allcancelled' => $allcancelled
        ]);
    }
}
