<?php



namespace App\Http\Controllers\LoginApi;



use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Str;


class GoogleController extends Controller

{


    public function redirectToGoogle(){
        // dd('here');
        return Socialite::driver('google')->redirect();

    }



    public function handleGoogleCallback(){

        try {

            $user = Socialite::driver('google')->user();

            $this->_registerOrLoginUser($user);



            // return redirect()->route('dashboard')->with("social-login","Login Successfully!!");
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // dd('here');

            return $e->getMessage();

        }

    }



    public function _registerOrLoginUser($data){

        $user = User::where('email','=',$data->email)->first();



        if(!$user){

            $user = new User();

            $user->name = $data->name;

            $user->email = $data->email;

            $user->slug = Str::slug($data->name);

            $user->user_name = Str::slug($data->name);

            $user->password = Hash::make($data->id);

            $user->role = 2;

            $user->status = 1;

            $user->social_login = 1;

            $user->save();



        }



        if(!empty($user) && $user->social_login == 0){

            return redirect()->route('dashboard')->with("social_message","Sorry, You have signed up with Buybest, login at BuyBest with your credentials.");

        }



        if(!empty($user) && $user->social_login == 2){

            return redirect()->route('dashboard')->with("social_message","Sorry, You have signed up at Buybest with Facebook, login with Facebook.");

        }


        if(!empty($user) && $user->social_login == 1){

            Auth::login($user);
            return redirect()->route('dashboard')->with("social-login","Login Successfully!!");

        }



    }





}

