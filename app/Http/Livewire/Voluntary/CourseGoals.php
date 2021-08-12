<?php

namespace App\Http\Livewire\Voluntary;

use App\Models\Goal;
use Livewire\Component;
use App\Models\Course;


class CourseGoals extends Component
{
    public $course, $goal;
    public $name;

    protected $rules = [
        'goal.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.voluntary.course-goals');
    }

    public function store(){
        $this->validate([
            'name' => 'required'
        ]);
        
        $this->course->goals()->create([
            'name' => $this->name
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }


    public function edit(Goal $goal){
        $this->goal = $goal;

    }

    public function update(){
        $this->validate();
        $this->goal->save();

        $this->goal = new Goal();
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Goal $goal  ){
        $goal->delete();
        $this->course = Course::find($this->course->id);
    }


}
