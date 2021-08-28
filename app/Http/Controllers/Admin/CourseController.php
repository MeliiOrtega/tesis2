<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedActivity;
use App\Mail\RejectActivity;

class CourseController extends Controller
{
    public function index(){
        $courses= Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function aprobado(){
        $courses= Course::where('status', 3)->orderBy('avg_rating','desc')->paginate(5);
        return view('admin.courses.approved', compact('courses'));
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

    public function observation(Course $course){
        return view('admin.courses.observation',compact('course'));
    }

    public function CourseUser(Course $course){
        return view('admin.courses.user-course',compact('course'));
    }

    public function reject(Request $request, Course $course){
        $request->validate([
            'body' => 'required'
        ]);
        /* return $request->all(); */
        /* $course->observation()->create(); */
        $course->observation()->create($request->all());
        $course->status = 1;
        $course->save();

        $mail = new RejectActivity($course);
        Mail::to($course->teacher->email)->queue($mail);
        return redirect()->route('admin.courses.index')->with('info', 'La actividad se ha rechazado con exito');



    }

}

