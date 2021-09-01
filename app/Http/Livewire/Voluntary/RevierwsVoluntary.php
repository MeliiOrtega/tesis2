<?php

namespace App\Http\Livewire\Voluntary;

use Livewire\Component;
use App\Models\Course;

class RevierwsVoluntary extends Component
{

        public $course_id, $comment;

        public $rating = 5;

        public function mount(Course $course){
            $this->course_id = $course->id;
        }


        public function render()
        {
            $course = Course::find($this->course_id);
            return view('livewire.voluntary.revierws-voluntary', compact('course'));
        }


    }
