<?php

namespace App\Http\Livewire\User;

use App\Actions\User\Role\DeleteRole;
use App\Actions\User\Role\GetRoles;
use App\Actions\User\Role\GetSoleRole;
use App\Actions\User\Role\UpdateRole;
use App\Providers\AuthServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RoleIndex extends Component
{
    /**
     * @var string
     */
    public $key;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $oldName;

    /**
     * @var array
     */
    protected $rules = [
        'key' => ['required', 'int'],
        'name' => ['required', 'string', 'max:50'],
    ];

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user.role', [
            'title' => __('Roles'),
            'roles' => GetRoles::run(),
            'totalUser' => 0,
            'adminRole' => AuthServiceProvider::ADMIN_ROLE,
        ]);
    }

    /**
     * @param array $role
     * @return void
     */
    public function edit(array $role): void
    {
        $this->key = $role['id'];
        $this->name = $this->oldName = $role['name'];
    }

    /**
     * @return void
     */
    public function update(): void
    {
        abort_if(!Auth::user()->can('edit role'), Response::HTTP_FORBIDDEN);

        $this->validate();

        abort_if(
            $this->oldName === AuthServiceProvider::ADMIN_ROLE,
            Response::HTTP_FORBIDDEN,
            __('You cannot edit the admin role.'),
        );

        UpdateRole::run($this->key, ['name' => $this->name]);
        $this->key = null;
        $this->name = null;
    }

    /**
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $role = GetSoleRole::run($id);
        abort_if(!Auth::user()->can('delete role') || $role->users_count >= 1, Response::HTTP_FORBIDDEN);

        DeleteRole::run($role->getKey());
    }
}
