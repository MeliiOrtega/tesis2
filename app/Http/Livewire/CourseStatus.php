<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{

    use AuthorizesRequests;

      public $course, $lesson;


    //RECIBIR LO QUE ENVIAMOS EN LA URL
    public function mount(Course $course){

        $this->course = $course;

         foreach ($course->lessons as $lesson) {
            $this->lesson = $lesson;
        }
     $this->authorize('enrolled', $course);
    }



    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson){
        $this->lesson = $lesson;
    }
    //termina la funcion

    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->lesson->id);
    }

    public function getPreviousProperty(){
        if($this->index == 0){
            return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if($this->index == $this->course->lessons->count() - 1){
            return  null;
        }else{
            return  $this->course->lessons[$this->index + 1];
        }
    }



}
