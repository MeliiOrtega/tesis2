<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
public function index(){
    $count_user = DB::table('users')->count();
    $count_voluntary = User::where('role','voluntario')->count();
    $count_adult = User::where('role','usuario')->count();

    $count_course = Course::where('status',3)->count();

    $rating = Course::where('status',3)
            ->latest('id')
            ->paginate(8);
return view('admin.index', compact('count_user', 'count_voluntary', 'count_adult', 'count_course','rating' ));
}
}
