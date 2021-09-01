<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ListCourseUser extends Component
{
    use WithPagination;
    public $user, $search;


    public function mount(User $user){
        $this->course = $user;
    }

    public function render()
    {

        $user = $this->course->courses_enrolled()->paginate(4);
        
        return view('livewire.admin.list-course-user', compact('user'));
    }

}
