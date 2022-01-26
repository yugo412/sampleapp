<?php

namespace App\Http\Controllers;

use App\Actions\Account\DeleteAccountPermanently;
use App\Actions\Account\UpdatePassword;
use App\Actions\Account\UpdateProfile;
use App\Http\Requests\Account\DeleteAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Requests\Account\UpdatePasswordRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * @return View
     */
    public function profile(): View
    {
        return view('account.profile', [
            'title' => __('Profile'),
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param UpdateAccountRequest $request
     * @return RedirectResponse
     */
    public function updateProfile(UpdateAccountRequest $request): RedirectResponse
    {
        $user = UpdateProfile::run(Auth::user(), $request->validated());

        return redirect()->route('profile', compact('user'));
    }

    /**
     * @return View
     */
    public function password(): View
    {
        return view('account.password', [
            'title' => __('Change Password'),
        ]);
    }

    /**
     * @param UpdatePasswordRequest $request
     * @return RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        UpdatePassword::run(Auth::user(), $request->password);

        return redirect()->route('password');
    }

    /**
     * @return View
     */
    public function TwoFactorAuth(): View
    {
        return view('account.two-factor', [
            'title' => __('Two-Factor Authentication'),
        ]);
    }

    /**
     * @return View
     */
    public function delete(): View
    {
        return view('account.delete', [
            'title' => __('Delete Account'),
        ]);
    }

    /**
     * @param DeleteAccountRequest $request
     * @return RedirectResponse
     */
    public function deletePermanently(DeleteAccountRequest $request): RedirectResponse
    {
        DeleteAccountPermanently::run(Auth::user());
            
        return redirect()->route('home');
    }
}
