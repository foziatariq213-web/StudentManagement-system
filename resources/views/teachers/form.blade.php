<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Teacher - SMS PRO</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#05070f;
    color:white;
    display:flex;
}

/* Sidebar */
.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    background:#0b1220;
    padding:30px;
    border-right:1px solid rgba(255,255,255,.08);
}

.sidebar h2{
    color:#22c55e;
    margin-bottom:25px;
}

.sidebar a{
    display:block;
    padding:12px;
    color:#94a3b8;
    text-decoration:none;
    border-radius:10px;
    margin-bottom:8px;
    transition:.3s;
}

.sidebar a:hover,
.sidebar .active{
    background:rgba(34,197,94,.15);
    color:white;
}

.logout{
    background:#dc2626;
    color:white !important;
    text-align:center;
    margin-top:20px;
}

/* Main */
.main{
    margin-left:260px;
    width:calc(100% - 260px);
    padding:40px;
}

/* Form Card */
.form-card{
    background:#111827;
    padding:30px;
    border-radius:20px;
    max-width:900px;
}

.form-card h1{
    margin-bottom:25px;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    margin-bottom:8px;
    font-weight:500;
}

.form-group input,
.form-group select{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#1f2937;
    color:white;
}

.full-width{
    grid-column:1 / -1;
}

.save-btn{
    background:#22c55e;
    color:white;
    border:none;
    padding:14px 25px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.save-btn:hover{
    background:#16a34a;
    transform:translateY(-2px);
}

</style>
</head>
<body>

<div class="sidebar">

    <h2>SMS PRO</h2>

    <a href="/">Dashboard</a>
    <a href="/students">Students</a>
    <a href="/attendance">Attendance</a>
    <a href="/courses">Courses</a>
    <a href="/teachers" class="active">Teachers</a>
    <a href="/reports">Reports</a>

    <a href="/login" class="logout">Logout</a>

</div>

<div class="main">

<div class="form-card">

    <h1>Add / Edit Teacher</h1>

   <form action="/teachers/store" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-grid">

        <div class="form-group">
            <label>Teacher Name</label>
            <input type="text" name="name" placeholder="Enter Teacher Name" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="teacher@email.com" required>
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="03XXXXXXXXX" required>
        </div>

        <div class="form-group">
            <label>Department</label>
            <select name="department" required>
                <option value="">Select Department</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Artificial Intelligence">Artificial Intelligence</option>
                <option value="Data Science">Data Science</option>
            </select>
        </div>

        <div class="form-group">
            <label>Assigned Course</label>
            <select name="course">
                <option value="Programming Fundamentals">Programming Fundamentals</option>
                <option value="OOP">OOP</option>
                <option value="Database Systems">Database Systems</option>
                <option value="Machine Learning">Machine Learning</option>
            </select>
        </div>

        <div class="form-group">
            <label>Qualification</label>
            <input type="text" name="qualification" placeholder="MS / MPhil / PhD" required>
        </div>

        <div class="form-group full-width">
            <label>Teacher Photo</label>
            <input type="file" name="photo">
        </div>

    </div>

    <button type="submit" class="save-btn">
        Save Teacher
    </button>

</form>

</div>

</div>

</body>
</html>