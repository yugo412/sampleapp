<?php

namespace App\Http\Controllers;

use App\Actions\Account\UpdateAccount;
use App\Actions\Account\UpdatePassword;
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
    public function account(): View
    {
        return view('account.account', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param UpdateAccountRequest $request
     * @return RedirectResponse
     */
    public function updateAccount(UpdateAccountRequest $request): RedirectResponse
    {
        $user = UpdateAccount::run(Auth::user(), $request->validated());

        return redirect()->route('account', compact('user'));
    }

    /**
     * @return View
     */
    public function password(): View
    {
        return view('account.password');
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
}
