<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // Show Attendance Page
    public function index(Request $request)
    {
        $students = Student::all();

        $date = $request->date ?? now()->toDateString();

        $todayAttendance = Attendance::where('attendance_date', $date)->get();

        $presentToday = $todayAttendance->where('status', 'Present')->count();
        $absentToday  = $todayAttendance->where('status', 'Absent')->count();

        $totalStudents = $students->count();

        $attendanceRate = $totalStudents > 0
            ? round(($presentToday / $totalStudents) * 100)
            : 0;

        return view('attendance.index', compact(
            'students',
            'presentToday',
            'absentToday',
            'attendanceRate',
            'date'
        ));
    }

    // Save Attendance
    public function store(Request $request)
    {
        $attendanceDate = $request->attendance_date ?? now()->toDateString();

        if (!$request->status || !is_array($request->status)) {
            return redirect('/attendance')
                ->with('error', 'Koi student nahi mila!');
        }

        foreach ($request->status as $studentId => $status) {
            Attendance::updateOrCreate(
                [
                    'student_id'      => $studentId,
                    'attendance_date' => $attendanceDate,
                ],
                [
                    'status' => $status,
                ]
            );
        }

        return redirect('/attendance?date=' . $attendanceDate)
            ->with('success', 'Attendance Saved Successfully');
    }
}