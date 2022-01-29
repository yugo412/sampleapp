<?php

namespace App\Http\Livewire\User;

use App\Actions\User\GetSoleUser;
use App\Actions\User\UpdateUser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserEdit extends Component
{
    /**
     * @var int
     */
    public $user;

    public $name;

    public $email;

    /**
     * @param integer $id
     * @return void
     */
    public function mount(int $id): void
    {
        $this->user = GetSoleUser::run($id, true);
        $this->fill([
            'email' => $this->user->email,
            'name' => $this->user->name,
        ]);
    }

    public function render(): View
    {
        return view('livewire.user.edit', [
            'user' => $this->user,
        ]);
    }

    /**
     * @return void
     */
    public function update(): void
    {
        abort_if(!Auth::user()->can('edit user', $this->user), Response::HTTP_FORBIDDEN);

        UpdateUser::run($this->user->getKey(), [
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }
}
