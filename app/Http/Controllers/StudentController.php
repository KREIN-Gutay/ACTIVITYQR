<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::all()->map(function ($student) {
           $ip = "http://192.168.1.10:8000"; 

$student->qr = QrCode::size(150)->generate($ip.'/students/'.$student->id);
            return $student;
        });

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'year' => 'required'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $qr = QrCode::size(200)->generate(url('/students/' . $student->id));

        return view('students.show', compact('student', 'qr'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'year' => 'required'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }

}
