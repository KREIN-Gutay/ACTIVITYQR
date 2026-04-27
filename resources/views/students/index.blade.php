@extends('layouts.app')

@section('content')

<h2>Students</h2>

<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>QR</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->year }}</td>
            <td>{!! $student->qr !!}</td>

            <td>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection