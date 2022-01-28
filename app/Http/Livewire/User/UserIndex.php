<?php

namespace App\Http\Livewire\User;

use App\Actions\User\DeleteUser;
use App\Actions\User\DisableTwoFactor;
use App\Actions\User\GetUsers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserIndex extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {        
        return view('livewire.user.index', [
                'title' => __('Users'),
                'users' => GetUsers::run([
                    'sort' => '-name',
                ]),
            ])
            ->layout('layouts.app');
    }

    /**
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        abort_if(!Auth::user()->can('delete user') || $id === Auth::id(), Response::HTTP_FORBIDDEN);

        DeleteUser::run($id);
    }

    /**
     * @param integer $id
     * @return void
     */
    public function disableTwoFactor(int $id): void
    {
        abort_if(!Auth::user()->can('disable user 2fa'), Response::HTTP_FORBIDDEN);

        DisableTwoFactor::run($id);
    }
}
