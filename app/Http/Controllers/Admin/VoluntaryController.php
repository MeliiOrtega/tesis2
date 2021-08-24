<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Course;

class VoluntaryController extends Controller
{
    public function index(){
        $courses= User::where('role','voluntario')->get();
        return $courses;

        return view('admin.voluntary.index', compact('courses'));
    }
}
