<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Course - SMS PRO</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*{ margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
body{ background:#05070f; color:white; display:flex; }
.sidebar{ width:260px; height:100vh; position:fixed; background:#0b1220; padding:30px; border-right:1px solid rgba(255,255,255,.08); }
.sidebar h2{ color:#22c55e; margin-bottom:25px; }
.sidebar a{ display:block; padding:12px; color:#94a3b8; text-decoration:none; border-radius:10px; margin-bottom:8px; transition:.3s; }
.sidebar a:hover, .sidebar .active{ background:rgba(34,197,94,.15); color:white; }
.logout{ background:#dc2626; color:white !important; text-align:center; margin-top:20px; }
.main{ margin-left:260px; width:calc(100% - 260px); padding:40px; }
.form-card{ background:#111827; padding:30px; border-radius:20px; max-width:800px; }
.form-card h1{ margin-bottom:25px; }
.form-group{ margin-bottom:20px; }
.form-group label{ display:block; margin-bottom:8px; }
.form-group input, .form-group select{ width:100%; padding:14px; border:none; border-radius:10px; background:#1f2937; color:white; }
.save-btn{ background:#22c55e; color:white; border:none; padding:14px 25px; border-radius:10px; cursor:pointer; font-weight:600; }
.save-btn:hover{ background:#16a34a; }
</style>
</head>
<body>

<div class="sidebar">
    <h2>SMS PRO</h2>
    <a href="/">Dashboard</a>
    <a href="/students">Students</a>
    <a href="/attendance">Attendance</a>
    <a href="/courses" class="active">Courses</a>
    <a href="/teachers">Teachers</a>
    <a href="/reports">Reports</a>
    <a href="/login" class="logout">Logout</a>
</div>

<div class="main">
    <div class="form-card">

        <h1>Edit Course</h1>

        @if($errors->any())
            <div style="background:#ef4444; padding:12px; border-radius:10px; margin-bottom:15px;">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="/courses/update/{{ $course->id }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="title" value="{{ $course->title }}">
            </div>

            <div class="form-group">
                <label>Course Code</label>
                <input type="text" name="code" value="{{ $course->code }}">
            </div>

            <div class="form-group">
                <label>Department</label>
                <select name="department">
                    <option {{ $course->department == 'Computer Science' ? 'selected' : '' }}>Computer Science</option>
                    <option {{ $course->department == 'Software Engineering' ? 'selected' : '' }}>Software Engineering</option>
                    <option {{ $course->department == 'Artificial Intelligence' ? 'selected' : '' }}>Artificial Intelligence</option>
                    <option {{ $course->department == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                </select>
            </div>

            <div class="form-group">
                <label>Credit Hours</label>
                <input type="number" name="credits" value="{{ $course->credits }}">
            </div>

            <button type="submit" class="save-btn">Update Course</button>

        </form>

    </div>
</div>

</body>
</html>
