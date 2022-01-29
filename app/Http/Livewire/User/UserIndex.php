<?php

namespace App\Http\Livewire\User;

use App\Actions\User\DeleteUser;
use App\Actions\User\DisableTwoFactor;
use App\Actions\User\GetUsers;
use App\Actions\User\RestoreUser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserIndex extends Component
{
    /**
     * @var array
     */
    public $deleteUser = [];

    /**
     * @return View
     */
    public function render(): View
    {        
        return view('livewire.user.index', [
                'title' => __('Users'),
                'users' => GetUsers::run([
                    'sort' => '-name',
                    'trashed' => true,
                ]),
            ]);
    }

    /**
     * @param integer $key
     * @return void
     */
    public function delete(int $key): void
    {
        abort_if(!Auth::user()->can('delete user') || $key === Auth::id(), Response::HTTP_FORBIDDEN);

        DeleteUser::run($key);
        $this->deleteUser = null;
    }

    /**
     * @param integer $key
     * @return void
     */
    public function restore(int $key): void
    {
        abort_if(!Auth::user()->can('restore user') || $key === Auth::id(), Response::HTTP_FORBIDDEN);

        RestoreUser::run($key);
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
