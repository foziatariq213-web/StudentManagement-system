<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Helpers\Department;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        $totalCourses = $courses->count();

        $departmentsList = Department::all();

        $departments = count($departmentsList);

        return view('courses.index', compact(
            'courses',
            'totalCourses',
            'departments',
            'departmentsList'
        ));
    }

    public function create()
    {
        $departmentsList = Department::all();

        return view('courses.create', compact('departmentsList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required',
            'code'       => 'required|unique:courses',
            'department' => ['required', Rule::in(Department::all())],
            'credits'    => 'required|integer',
        ]);

        Course::create($request->only([
            'title',
            'code',
            'department',
            'credits'
        ]));

        return redirect('/courses')
            ->with('success', 'Course Added Successfully!');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        $departmentsList = Department::all();

        return view('courses.edit', compact('course', 'departmentsList'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title'      => 'required',
            'code'       => 'required|unique:courses,code,' . $id,
            'department' => ['required', Rule::in(Department::all())],
            'credits'    => 'required|integer',
        ]);

        $course->update($request->only([
            'title',
            'code',
            'department',
            'credits'
        ]));

        return redirect('/courses')
            ->with('success', 'Course Updated Successfully!');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();

        return redirect('/courses')
            ->with('success', 'Course Deleted Successfully!');
    }
}