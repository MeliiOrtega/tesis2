<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;

class CoursesIndex extends Component
{

    public $category_id = 3;

    public function render()

    {
        $categories = Category::all();
        $courses = Course::where('status',3)
        ->where('category_id', $this->category_id)
        ->latest('id')
        ->paginate(8);

        return view('livewire.courses-index', compact('courses', 'categories'));
    }

}

/* ESTE COMPONENTE ESTA INACTIVO, LA VISTA DE ESTE LIVEWIRE NO ES, EL ARCHIVO CORRESPONDIENTE A ESTE ESTA EN LA CARPETA
COURSES -> INDEX.BLADE.PHP */
