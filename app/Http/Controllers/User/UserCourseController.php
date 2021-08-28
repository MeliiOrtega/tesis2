<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function index(){
        /* $courses =Course::where('title', 'LIKE','%' . $this->search . '%')
        ->where('user_id', auth()->user()->id)
        ->latest('id')
        ->paginate(8); */
        $courses = User::find(auth()->user()->id)->courses_enrolled()->paginate(6);
        /* $roles = App\User::find(1)->roles()->orderBy('name')->get(); */
        /* return $categories; */
        return view('user.index', compact('courses'));
    }
}
