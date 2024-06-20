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

    //method untuk menampilkan form tambah courses
    public function create(){
        return view('admin.contents.course.create');
    }

     //method untuk menyimpan data courses 
     public function store(Request $request)
     {
         //validasi data
         $request->validate([
             'nama'=> 'required',
             'category'=>'required',
             'desc'=>'required',
         ]);
 
         //simpan ke database
         $courses = Course::create([
             'nama'=> $request->nama,
             'category'=> $request->category,
             'desc'=> $request->desc,
         ]);
 
         //kembalikan ke halaman course
         return redirect('/admin/course')->with('message','Berhasil Menambahkan Course');
     }

     //metode untuk menampilkan halaman edit 
    public function edit(Request $request){
        return view('admin.contents.course.edit', [
            'courses' => $courses
        ]);
    }

    //method untuk menyimpan hasil update
    public function update(Request $request){
    
        //validasi request
         $request->validate([
            'nama'=> 'required',
            'category'=>'required',
            'desc'=>'required',
         ]);

         //simpan perubahan
         $courses->update([
            'nama'=> $request->nama,
            'category'=> $request->category,
            'desc'=> $request->desc,
        ]);

        //kembalikan ke halaman student
        return redirect('/admin/course')->with('message','Berhasil Mengedit Course');
    }

    
}
