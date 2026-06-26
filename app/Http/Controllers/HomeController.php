<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Attendance;
use App\Helpers\Department;

class HomeController extends Controller
{
    public function index()
    {
        // Dashboard Cards
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalCourses = Course::count();
        $departmentCount = count(Department::all());

        // Today's Attendance
        $today = now()->toDateString();

        $presentToday = Attendance::whereDate('attendance_date', $today)
            ->where('status', 'Present')
            ->count();

        $absentToday = Attendance::whereDate('attendance_date', $today)
            ->where('status', 'Absent')
            ->count();

        // Overall Attendance Rate
        $attendanceTotal = Attendance::count();
        $attendancePresent = Attendance::where('status', 'Present')->count();

        $attendanceRate = $attendanceTotal > 0
            ? round(($attendancePresent / $attendanceTotal) * 100)
            : 0;

        // Monthly Admissions Line Chart
        $months = [];
        $admissions = [];

        for ($i = 1; $i <= 12; $i++) {

            $months[] = date('M', mktime(0, 0, 0, $i, 1));

            $admissions[] = Student::whereMonth('created_at', $i)
                ->whereYear('created_at', now()->year)
                ->count();
        }

        // Department Distribution (Pie Chart)
        $departmentData = collect(Department::all())->map(function ($dept) {
            return [
                'department' => $dept,
                'total' => Student::where('department', $dept)->count(),
            ];
        });

        // Attendance Performance (Bar Chart)
        $attendanceData = collect(Department::all())->map(function ($dept) {

            $present = Attendance::whereHas('student', function ($q) use ($dept) {
                $q->where('department', $dept);
            })->where('status', 'Present')->count();

            $absent = Attendance::whereHas('student', function ($q) use ($dept) {
                $q->where('department', $dept);
            })->where('status', 'Absent')->count();

            return [
                'department' => $dept,
                'present' => $present,
                'absent' => $absent,
            ];
        });

        return view('home', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'departmentCount',
            'presentToday',
            'absentToday',
            'attendanceRate',
            'months',
            'admissions',
            'departmentData',
            'attendanceData'
        ));
    }
}