<?php

namespace App\Http\Livewire\Account;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Token extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.account.token', [
            'tokens' => Auth::user()->tokens,
        ]);
    }

    /**
     * @param [type] $id
     * @return void
     */
    public function deleteToken($id): void
    {
        try {
            $token = Auth::user()->tokens()->findOrFail($id);
            $token->delete();
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
