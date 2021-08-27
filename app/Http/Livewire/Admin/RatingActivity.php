<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;

class RatingActivity extends Component
{
    public function render()
    {
        $courses = Course::where('status',3)->orderBy('avg_rating', 'desc')->take(3)->paginate(3);

        return view('livewire.admin.rating-activity', compact('courses'));
    }
}
