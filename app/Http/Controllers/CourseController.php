<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(){
        $courses = Course::where('status',3)->latest('id')->paginate(8);
        $categories = Category::all();
//        $courses = Course::where('status',3)->where('category_id', $this->category_id)->latest('id')->paginate(8);
        // return $courses;
        /* metodo latest ordena en forma descente
        */
     // return Course::find(2)->rating;
       return view('courses.index', compact('courses', 'categories'));
    }

    public function show(Course $course){

       $this->authorize('published', $course);

        $similares = Course::where('category_id',$course->category_id)
                            ->where('id', '!=', $course->id)
                            ->where('status', 3)
                            ->latest('id')
                            ->take(5)
                            ->get();
        return view('courses.show', compact('course','similares'));
    }

    public function category(Category $category){
       // $categories = Category::all();
        $courses = Course::where('category_id', $category->id)->where('status',3)->latest('id')->paginate(8);
        return view('courses.category', compact('courses', 'category'));
    }


    public function enrolled(Course $course){
         $course->students()->attach(auth()->user()->id);
         return redirect()->route('courses.status',$course);;
    }


   /*  public function status(Course $course){
        return view('courses.status', compact('course'));

    } */


}
