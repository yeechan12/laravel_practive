<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /**
     * @return view
     */
    public function index()
    {
        return view('auth.login');
    }

    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * @return view
     */
    public function callback()
    {
            
        $userInfo = Socialite::driver('google')->user();
        
        $user = $this->createUser($userInfo);
    
        auth()->login($user);
    
        return redirect()->to('/home');
    
    }

    /**
     * 
     * @param array $userInfo
     * @return User
     */
    private function createUser($userInfo)
    {
        $user = User::where('email', $userInfo->email)->first();
        
        if (!$user) {
            $user = User::create([
                'name'     => $userInfo->name,
                'email'    => $userInfo->email,
            ]);
        }

        return $user;
    }
}
