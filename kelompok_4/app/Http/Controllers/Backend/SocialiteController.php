<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $socialData = [
            'provider_id'   => $socialUser->getId(),
            'provider_name' => $provider,
            'name'          => $socialUser->getName(),
            'email'         => $socialUser->getEmail(),
            'image'         => $socialUser->getAvatar(),
        ];

        $onlyColumns   = Arr::only($socialData, ['provider_id', 'provider_name']);
        $exceptColumns = Arr::except($socialData, ['provider_id', 'provider_name']);

        $socialAccount = SocialAccount::where($onlyColumns)->first();

        // jika akun sns sudah ada maka update user, siapa tahu ada perubahan dengan akun sns nya
        if ($socialAccount) {
            $user = User::find($socialAccount->user_id);

            if (!Storage::exists($user->image)) {
                $user->update($exceptColumns);
            }
        } else {
            $user = User::create($exceptColumns);
            $user->socialAccount()->create($onlyColumns);
        }

        Auth::login($user);

        return redirect()->route('backend.index');
    }
}
