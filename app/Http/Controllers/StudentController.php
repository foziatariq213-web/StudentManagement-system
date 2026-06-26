<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Students List
    
    public function index(Request $request)
{
    $search = $request->search;

    $students = Student::query()
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('roll_no', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%");
        })
        ->paginate(10);

    return view('students.index', compact('students', 'search'));
}

    // Save Student
    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'roll_no' => $request->roll_no,
            'department' => $request->department,
            'course' => $request->course,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);

        return redirect('/students');
    }

    // Edit Student Form
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.form', compact('student'));
    }

    // Update Student
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name,
            'roll_no' => $request->roll_no,
            'department' => $request->department,
            'course' => $request->course,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);

        return redirect('/students');
    }

    // Delete Student
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect('/students');
    }
}