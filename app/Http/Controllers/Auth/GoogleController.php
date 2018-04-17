<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Hash;
class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

  //       $token = $user->token;
		// $refreshToken = $user->refreshToken; // not always provided
		// $expiresIn = $user->expiresIn;

		// // OAuth One Providers
		// $token = $user->token;
		// $tokenSecret = $user->tokenSecret;

		// All Providers
		// $user->getId();
		// $user->getNickname();
		// $user->getName();
		// $user->getEmail();
		// $user->getAvatar();
        $data=array();
        $data['googleId']=$user->getId();
        $data['name']=$user->getName();
        $data['email']=$user->getEmail();
        $data['password']=Hash::make($user->token);

        if (isset(User::find($data['id']))) {
            
        }else{

        }
    	$a=User::create($data);
    	//Auth::gurad('admin')->login($a);
        Auth::login($a);
    	// Auth::loginUsingId($a->id);
    	return redirect()->route('posts.index');
    }
}