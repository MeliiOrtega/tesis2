<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses= Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course){
        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course){
        if(!$course->lessons || !$course->goals || !$course->image){
            return back()->with('info', 'No se puede publicar una actividad que no este completa');
        }
        $course->status = 3;
        $course->save();

        return redirect()->route('admin.courses.index')->with('info', 'La actividad se publico con exito');
    }

}
