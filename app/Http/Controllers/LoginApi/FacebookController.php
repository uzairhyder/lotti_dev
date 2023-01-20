<?php



namespace App\Http\Controllers\LoginApi;



use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Str;

class FacebookController extends Controller

{

    public function redirectToFacebook()

    {

        try {



            return Socialite::driver('facebook')->redirect();

        } catch (\Exception $e) {

            return $e->getMessage();

        }

    }



    public function handleFacebookCallback()

    {
        // dd("here");

        try {

            $user = Socialite::driver('facebook')->user();

            $this->_registerOrLoginUser($user);



            // return redirect()->route('dashboard')->with("social-login","Login Successfully!!");
            return redirect()->route('dashboard');

        } catch (\Exception $e) {

            return $e->getMessage();

        }


    }



    public function _registerOrLoginUser($data)

    {

        try {

            $user = User::where('email', '=', $data->email)->first();

            if (!$user) {

                $user = new User();

                $user->name = $data->name;

                $user->email = $data->email;

                $user->password = Hash::make($data->id);

                $user->slug = Str::slug($data->name);

                $user->user_name = $data->name;

                $user->social_login = 2;

                $user->status = 1;

                $user->role = 2;

                $user->save();

            }
            // dd('here');

            if(!empty($user) && $user->social_login == 0){
                // $notification = array('message' => 'You have already signed up with this email please login to continue! ', 'alert-type' => 'success');
                // return redirect()->route('login')->with($notification);

                return redirect()->route('dashboard')->with("social_message","Sorry, You have signed up with Buybest, login at BuyBest with your credentials.");

            }


            if(!empty($user) && $user->social_login == 2){

                Auth::login($user);
                return redirect()->route('dashboard')->with("social-login","Login Successfully!!");

            }


            if(!empty($user) && $user->social_login == 1){


                return redirect()->route('dashboard')->with("social_message","Sorry, You have signed up at Buybest with Gmail, login with Gmail.");

            }

        } catch (\Exception $e) {

            return $e->getMessage();

        }

    }

}
