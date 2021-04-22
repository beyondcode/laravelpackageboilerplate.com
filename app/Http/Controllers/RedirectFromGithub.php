<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class RedirectFromGithub extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Socialite::driver('github')->user();

        $authUser = $this->findOrCreateUser($user);

        auth()->login($authUser, true);

        $request->session()->put('github_token', $user->token);

        return redirect('/?github=auth');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {
        return User::firstOrCreate([
            'github_id' => $githubUser->id,
        ],[
            'name' => $githubUser->name,
            'nickname' => $githubUser->nickname,
            'github_token' => $githubUser->token,
            'email' => $githubUser->email,
            'avatar' => $githubUser->avatar
        ]);
    }
}
