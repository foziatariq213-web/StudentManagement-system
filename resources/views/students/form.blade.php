<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Student - SMS PRO</title>

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

.sidebar a:hover{
    background:rgba(34,197,94,.15);
    color:white;
}

.active{
    background:rgba(34,197,94,.15);
    color:white !important;
}

.logout{
    background:#dc2626;
    color:white !important;
    text-align:center;
    margin-top:20px;
}

.logout:hover{
    background:#b91c1c !important;
}

/* Main */
.main{
    margin-left:260px;
    width:calc(100% - 260px);
    padding:40px;
}

.page-title{
    margin-bottom:25px;
}

.page-title h1{
    font-size:32px;
}

/* Form Card */
.form-card{
    background:#111827;
    padding:30px;
    border-radius:20px;
    border:1px solid rgba(255,255,255,.05);
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.form-group{
    display:flex;
    flex-direction:column;
}

.form-group label{
    margin-bottom:8px;
    color:#cbd5e1;
}

.form-group input,
.form-group select{
    padding:14px;
    border:none;
    border-radius:12px;
    background:#1f2937;
    color:white;
    outline:none;
}

.form-group input:focus,
.form-group select:focus{
    border:1px solid #22c55e;
}

/* Full Width */
.full{
    grid-column:1 / -1;
}

/* Upload Box */
.upload-box{
    border:2px dashed rgba(255,255,255,.15);
    padding:30px;
    border-radius:15px;
    text-align:center;
}

/* Buttons */
.btn-area{
    margin-top:25px;
    display:flex;
    gap:15px;
}

.save-btn{
    background:#22c55e;
    color:white;
    border:none;
    padding:14px 25px;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
}

.save-btn:hover{
    background:#16a34a;
}

.cancel-btn{
    background:#374151;
    color:white;
    padding:14px 25px;
    border-radius:10px;
    text-decoration:none;
    display:inline-block;
    cursor:pointer;
}

.cancel-btn:hover{
    background:#4b5563;
}

</style>
</head>
<body>

<div class="sidebar">

    <h2>SMS PRO</h2>

    <a href="/">Dashboard</a>
    <a href="/students">Students</a>
    <a href="#">Attendance</a>
    <a href="#">Courses</a>
    <a href="#">Teachers</a>
    <a href="#">Reports</a>

    <a href="#" class="logout">Logout</a>

</div>

<div class="main">

    <div class="page-title">
        <h1>Add New Student</h1>
    </div>

    <div class="form-card">

        <form action="/students/store" method="POST">
    @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="name" placeholder="Enter student name">
                </div>

                <div class="form-group">
                    <label>Roll Number</label>
                    <input type="text" name="roll_no" placeholder="Enter roll number">
                </div>

                <div class="form-group">
                    <label>Department</label>
                   <select name="department">
                        <option>Select Department</option>
                        <option>Computer Science</option>
                        <option>Software Engineering</option>
                        <option>Artificial Intelligence</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Course</label>
                    <select name="course">
                        <option>Select Course</option>
                        <option>Web Development</option>
                        <option>Database Systems</option>
                        <option>Programming Fundamentals</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" placeholder="03XXXXXXXXX">
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="student@email.com">
                </div>

                <div class="form-group full">
                    <label>Student Photo</label>

                    <div class="upload-box">
                        <input type="file">
                    </div>
                </div>

            </div>

            <div class="btn-area">
                <button type="submit" class="save-btn">
                    Save Student
                </button>

                <a href="/students" class="cancel-btn">
    Cancel
</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>