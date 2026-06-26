<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Management Report</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            padding:30px;
        }

        h1{
            text-align:center;
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #000;
            padding:10px;
            text-align:left;
        }

        th{
            background:#10b981;
            color:white;
        }
    </style>
</head>
<body>

<h1>Student Management System Report</h1>

<table>
    <tr>
        <th>Total Students</th>
        <td>{{ $totalStudents }}</td>
    </tr>

    <tr>
        <th>Total Teachers</th>
        <td>{{ $totalTeachers }}</td>
    </tr>

    <tr>
        <th>Total Courses</th>
        <td>{{ $totalCourses }}</td>
    </tr>

    <tr>
        <th>Total Departments</th>
        <td>{{ $departmentCount }}</td>
    </tr>

    <tr>
        <th>Attendance Rate</th>
        <td>{{ $attendanceRate }}%</td>
    </tr>
</table>

</body>
</html>