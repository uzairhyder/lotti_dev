<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BillingInfo;
use Illuminate\Http\Request;
use App\Models\FrontendModels\Order;
use Illuminate\Support\Facades\Mail;
use App\Models\BackendModels\OrderNote;

class OrderManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->orderBy('id','desc')->where('order_status','!=',null)->get();

        // dd($orders);
        return view('admin_dashboard.orderManagement.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = Order::where('id',$id)->with('user','purchased_items.product','purchased_items.variations')->first();
        // return $order->order_status;
        $order_notes  = OrderNote::where('order_id',$order->id)->with('ordernotes')->get();
        // return $order_notes;
        $invoices = Order::where('id',$id)->with('user','purchased_items','billing_address','shipping_address')->has('purchased_items','!=','')->first();
        // dd($invoices);
        $shipping = json_decode($order->shipping_address) ?? '' ;
        $billing = json_decode($order->billing_address) ?? '' ;

        $check_cancelled_order  = BillingInfo::where('order_id',$order->id)->first();
        // return $check_cancelled_order;

        // if(count($order->purchased_items) > 0){
        //     foreach($order->purchased_items as $item){

        //         if($item->id == $id){
        //             $shipping = json_decode($item->shipping_address);
        //             $billing = json_decode($item->billing_address);
        //         }
        //     }
        // }

        // dd($shipping);
        return view('admin_dashboard.orderManagement.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function order_status(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->comment = $request->comment;

        if($order->order_status == 1){
            $order->processing_at = Carbon::now();
        }

        if($order->order_status == 2){
            $order->shipped_at = Carbon::now();
        }

        if($order->order_status == 3){
            $order->delivered_at = Carbon::now();
        }
        if($order->order_status == 4){
            $order->cancelled_at = Carbon::now();
        }
        if($order->order_status == 5){
            $order->hold_at = Carbon::now();
        }
        $order->save();

        $order_notes  = new OrderNote();
        $order_notes->order_id = $order->id;
        $order_notes->order_comment = $request->comment;
        $order_notes->order_notes_status = $request->order_status;
        $order_notes->status_changed_time = Carbon::now();
        $order_notes->save();

         // update wok 19
        if($order){

            if(!empty($request->comment)){
                $user = User::find($order->user_id);
                $send_mail_user = $user->email;
                // return $user;

                $data = $user;
                $comment = !empty($request->comment) ? $request->comment : '';
                Mail::send('frontend.emails.order-status', ['data' => $data, 'order' => $order, 'comment' => $comment], function ($message) use ($send_mail_user){
                    $message->to($send_mail_user, 'Order Status')->subject('Order Status');
                });
            }

            return back()->with('order_status','Order status has been changed.');

        }else{
            return back()->with('order_status_error','Oops! something went wrong.');
        }

    }


    public function invoice_index(Request $request, $id)
    {
        $order = Order::where('id',$id)->with('user','purchased_items','billing_address','shipping_address')->first();
        // return $order;
        foreach($order->purchased_items as $data){
                $cancel_data =  $data->where('order_status',2)->orWhere('order_status',3)->sum('total');
            }
            
        if(count($order->purchased_items) > 0){
            $shipping = '';
            $billing = '';
            foreach($order->purchased_items as $item){

                if($item->id == $id){
                    $shipping = json_decode($item->shipping_address);
                    $billing = json_decode($item->billing_address);
                }
            }
        }

        return view('admin_dashboard.orderManagement.invoice',get_defined_vars());


        // $order = Order::where('id',$id)->with('user','billing_address','shipping_address')->has('purchased_items','!=','')->first();
        // $invoices = Order::where('id',$id)->with('user','purchased_items','billing_address','shipping_address')->has('purchased_items','!=','')->first();

    }


    public function cancelstatus(Request $request,$id){


        // dd($id);
        // update work 13
        $cancel_status = BillingInfo::where('order_id',$id)->get();
        // return $cancel_status;

        foreach($cancel_status as $cancel){
            $cancel->cancellation_status = 1;
            $cancel->save();
        }
        // foreach()

        $status_change  = Order::where('id',$cancel->order_id)->first();
        // update work 16
        $status_change->order_status = 10;
        $status_change->save();
        $notification = array('message' => 'Product Status Changed Successfully! ', 'alert-type' => 'success');
        return redirect()->route('orderManagement.index')->with($notification);
    }

    public function refundstatus(Request $request,$id){


        // dd($id);
        $cancel_status = BillingInfo::where('order_id',$id)->get();
        // return $cancel_status;

        foreach($cancel_status as $cancel){
            $cancel->cancellation_status = 2;
            $cancel->save();
        }

        $status_change  = Order::where('id',$cancel->order_id)->first();
        // update work 16
        $status_change->order_status = 9;
        $status_change->save();
        $notification = array('message' => 'Product Refund Approved Successfully! ', 'alert-type' => 'success');
        return redirect()->route('orderManagement.index')->with($notification);
    }
}
