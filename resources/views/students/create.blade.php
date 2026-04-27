@extends('layouts.app')

@section('content')

<h2>Add Student</h2>

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name" class="form-control mb-2">
    <input type="text" name="course" placeholder="Course" class="form-control mb-2">
    <input type="text" name="year" placeholder="Year" class="form-control mb-2">

    <button class="btn btn-success">Save</button>
</form>

@endsection