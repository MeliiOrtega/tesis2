<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Course;

class ActivityPendiente extends Component
{
    public function render()
    {
        $courses = Course::where('status',2)->orderBy('id', 'desc')->take(3)->paginate(3);
        return view('livewire.admin.activity-pendiente', compact('courses'));
    }
}
