<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;


class ActivityAdult extends Component
{
    public function render()
    {
        $courses = Course::where('status',3)->withCount('students')->orderBy('students_count','desc')->paginate(3);
       
        return view('livewire.admin.activity-adult', compact('courses'));
    }
}
