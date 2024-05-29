<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //method untuk menampilkan data courses
    public function index(){
        //menarik data dari database
        $courses = Course::all();

        //panggil view dan kirim data courses
        return view('admin.contents.course.index', [
            'courses' => $courses
        ]);
    }
}
