<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\User as RequestsUser;
use App\Http\Requests\EditUser as RequestsEditUserr;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role','!=' ,1)->get();
        return view('admin_dashboard.users.index',compact('users'));
    }
    public function create(){
        return view('admin_dashboard.users.create');
    }
    public function store(RequestsUser $request){
        $user = $request->validated();
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->first_name." ".$request->last_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->slug = Str::slug($request->user_name,"-");
        $user->password = Hash::make($request->password);
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->role = 2;
        $user->status = 1;
        $user->save();
        $notification = array('message' => 'User Created Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);

    }
    public function edit($id){
        $users = User::find($id);
        return view('admin_dashboard.users.edit',compact('users'));
    }
    public function update(RequestsEditUserr $request ,$id){
        $user = $request->validated();
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->first_name." ".$request->last_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->slug = Str::slug($request->user_name,"-");
        $user->password = Hash::make($request->password);
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->role = 2;
        $user->status = 1;
        $user->save();
        $notification = array('message' => 'User Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }
    public function delete(Request $request,$id){
        $delete_user = User::find($id);
        $delete_user->delete();
        $notification = array('message' => 'User Deleted Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }
    public function status(Request $request,$id){
        $user_status = User::find($id);
        if($user_status->status == 0){
            $user_status->status =1;
        }else {
            $user_status->status =0;
        }
        $user_status->save();
        $notification = array('message' => 'User Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('user-index')->with($notification);
    }

}
