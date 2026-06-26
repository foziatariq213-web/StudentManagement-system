<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Attendance;
use App\Helpers\Department;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        // Dashboard Cards
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalCourses = Course::count();

        // Departments
        $departments = Department::all();
        $departmentCount = count($departments);

        // Attendance Rate
        $attendanceTotal = Attendance::count();
        $attendancePresent = Attendance::where('status', 'Present')->count();

        $attendanceRate = $attendanceTotal > 0
            ? round(($attendancePresent / $attendanceTotal) * 100)
            : 0;

        // Department Distribution (Pie Chart)
        $departmentData = collect($departments)->map(function ($dept) {
            return [
                'department' => $dept,
                'total' => Student::where('department', $dept)->count(),
            ];
        });

        // Attendance Report (Bar Chart)
        $attendanceData = collect($departments)->map(function ($dept) {

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

        return view('reports.index', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'departments',
            'departmentCount',
            'attendanceRate',
            'departmentData',
            'attendanceData'
        ));
    }

    // ==========================
    // Export PDF
    // ==========================
    public function exportPdf()
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalCourses = Course::count();

        $departments = Department::all();
        $departmentCount = count($departments);

        $attendanceTotal = Attendance::count();
        $attendancePresent = Attendance::where('status', 'Present')->count();

        $attendanceRate = $attendanceTotal > 0
            ? round(($attendancePresent / $attendanceTotal) * 100)
            : 0;

        $pdf = Pdf::loadView('reports.pdf', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'departmentCount',
            'attendanceRate'
        ));

        return $pdf->download('Student_Management_Report.pdf');
    }
}