<?php

namespace App\Http\Livewire\Admin;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class UserCourse extends Component
{

    use WithPagination;
    public $course, $search;


    public function mount(Course $course){
        $this->course = $course;
    }

    public function updatingSearch(){
        $this->resetPage();
    }



    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(4);
        return view('livewire.admin.user-course', compact('students'));
    }
}
