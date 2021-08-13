<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedActivity;
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
        if(!$course->lessons || !$course->goals){
            return back()->with('info', 'No se puede publicar una actividad que no este completa');
        }
        
        $course->status = 3;
        $course->save();

        //Enviar correo electronico
        $mail = new ApprovedActivity($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'La actividad se publico con exito');
    }

}

