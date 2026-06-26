<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers         = Teacher::all();
        $totalTeachers    = $teachers->count();
        $totalDepartments = $teachers->pluck('department')->unique()->count();

        return view('teachers.index', compact(
            'teachers',
            'totalTeachers',
            'totalDepartments'
        ));
    }

    public function create()
    {
        return view('teachers.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:teachers',
            'phone'         => 'required',
            'department'    => 'required',
            'qualification' => 'required',
        ]);

        Teacher::create($request->only([
            'name', 'email', 'phone', 'department', 'qualification'
        ]));

        return redirect('/teachers')->with('success', 'Teacher Added Successfully!');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:teachers,email,' . $id,
            'phone'         => 'required',
            'department'    => 'required',
            'qualification' => 'required',
        ]);

        $teacher->update($request->only([
            'name', 'email', 'phone', 'department', 'qualification'
        ]));

        return redirect('/teachers')->with('success', 'Teacher Updated Successfully!');
    }

    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return redirect('/teachers')->with('success', 'Teacher Deleted Successfully!');
    }
}