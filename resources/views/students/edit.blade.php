@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $student->name }}" class="form-control mb-2">
    <input type="text" name="course" value="{{ $student->course }}" class="form-control mb-2">
    <input type="text" name="year" value="{{ $student->year }}" class="form-control mb-2">

    <button class="btn btn-success">Update</button>
</form>

@endsection