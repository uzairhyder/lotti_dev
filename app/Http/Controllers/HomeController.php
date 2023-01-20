<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BackendModels\Logo;
use App\Models\FrontendModels\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\BackendModels\Inquiry;
use App\Models\BackendModels\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

// $GLOBALS = array(
//     "navLogo" => Logo::where("type", "navLogo")->first()->image,
//     "favicon" => Logo::where("type", "favicon")->first()->image,
//     "footerLogo" => Logo::where("type", "footerLogo")->first()->image
// );
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $logoManager;

    public function __construct()
    {
        $this->middleware('auth');
        global $GLOBALS;
        // $this->logoManager = & $GLOBALS;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inquiry_count = Inquiry::count();
        $user_count = User::where('role','!=',1)->count();
        $product_count = Product::count();
        $order_count = Order::with('user')->orderBy('id','desc')->where('order_status','!=',null)->count();
        $today_sale = Order::whereDate('created_at', Carbon::today())->sum('total_price');
        $month_sale  =  Order::whereMonth('created_at', Carbon::today())->sum('total_price');
        $week_sale  =   Order::whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total_price');
        $year_sale  = Order::whereYear('created_at', Carbon::now()->year)->sum('total_price');
        $pending = Order::where('order_status',1)->count();
        $delivered = Order::where('order_status',3)->count();
        $cancelled  = Order::where('order_status',4)->count();
        if(!empty($cancelled)){
            $cancel_percentage = $cancelled / $order_count  * 100;
        }
        if(!empty($pending)){
            $pending_percentage  = $pending /  $order_count * 100;
        }
        if(!empty($delivered)){
            $delivered_percentage = $delivered / $order_count * 100;
        }
        return view('home', get_defined_vars());
    }

    


}
