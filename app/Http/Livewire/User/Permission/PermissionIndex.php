<?php

namespace App\Http\Livewire\User\Permission;

use App\Actions\User\Permission\GetPermissions;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PermissionIndex extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user.permission.index', [
            'title' => __('Permission'),
            'permissions' => GetPermissions::run(),
        ]);
    }
}
