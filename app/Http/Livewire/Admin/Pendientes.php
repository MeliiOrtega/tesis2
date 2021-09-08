<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;

class Pendientes extends Component
{
    use WithPagination;

    public $search, $sortBy = 'title';
    public $sortDirection = 'asc';
    public function render()
    {
        $courses = Course::where('title', 'LIKE','%' . $this->search . '%')
                            ->orWhere('avg_rating', 'LIKE','%' . $this->search . '%' )
                            ->orWhereHas('category', function($query){
                                $query->where('name', 'LIKE','%' . $this->search . '%' );
                            })
                            ->orWhereHas('teacher', function($query){
                                $query->where('name', 'LIKE','%' . $this->search . '%' );
                            })
                            ->where('status',2)
                            ->orderBy($this->sortBy, $this->sortDirection)
                            ->paginate(8);

        return view('livewire.admin.pendientes', compact('courses'));
    }

    public function sortBy($field){
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $field;

    }

     public function limpiar_page(){
$this->reset('page');
    }
}
