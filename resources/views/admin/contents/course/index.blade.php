@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Courses</li>
        </ol>
      </nav>
  </div><!-- End Page Title -->

  <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="/admin/course/create" class="btn btn-primary mt-4">+ Courses</a>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $loop ->iteration}}</td>
                        <td>{{ $course ->nama}}</td>
                        <td>{{ $course ->category}}</td>
                        <td>{{ $course ->desc}}</td>

                        <td>
                            <a href="/admin/course/edit" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
  </section>
@endsection