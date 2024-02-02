<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Classes\Gitea;
use Socialite;
use Auth;
use SocialiteProviders\Manager\Exception\InvalidArgumentException;
use Session;

class AuthGiteaController extends Controller
{
    public function handleProviderCallback(AuthRequest $request)
    {
        $provider = 'gitea';
        $giteaUser = Gitea::login($request->post("username"), $request->post("passwd"));

        if (!$giteaUser) {
            return redirect()->route('auth.login');
        }

        $data = app(ucfirst($provider))->tplUser($giteaUser);

        $user = User::updateOrCreate(['provider_id' => $data['provider_id']], $data);

        Auth::loginUsingId($user->id);

        return redirect()->route('user.dashboard');
    }
}
