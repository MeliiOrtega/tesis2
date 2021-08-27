<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserLast extends Component
{
    public function render()
    {
        $users = User::orderBy('id','desc')->paginate(5);


        return view('livewire.admin.user-last', compact('users'));
    }
}
