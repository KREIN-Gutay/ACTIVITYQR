@extends('layouts.app')

@section('content')

<h2>Student Details</h2>

<p>Name: {{ $student->name }}</p>
<p>Course: {{ $student->course }}</p>
<p>Year: {{ $student->year }}</p>

<h4>QR Code:</h4>
{!! $qr !!}

@endsection