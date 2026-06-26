<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attendance - SMS PRO</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*{ margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
body{ background:#05070f; color:white; display:flex; }

.sidebar{ width:260px; height:100vh; position:fixed; background:#0b1220; padding:30px; border-right:1px solid rgba(255,255,255,.08); }
.sidebar h2{ color:#22c55e; margin-bottom:25px; font-size:22px; letter-spacing:1px; }
.sidebar a{ display:block; padding:12px; color:#94a3b8; text-decoration:none; border-radius:10px; margin-bottom:8px; transition:.3s; }
.sidebar a:hover, .sidebar .active{ background:rgba(34,197,94,.15); color:white; }
.logout{ background:#dc2626; color:white !important; text-align:center; margin-top:20px; }

.main{ margin-left:260px; width:calc(100% - 260px); padding:40px; }

.page-header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; }
.page-header h1{ font-size:30px; font-weight:700; }

/* Success */
.success-box{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    padding:14px 20px; border-radius:12px; margin-bottom:20px;
    text-align:center; font-weight:600;
    box-shadow:0 4px 15px rgba(34,197,94,0.3);
    animation: fadeDown .4s ease;
}
@keyframes fadeDown{ from{opacity:0;transform:translateY(-10px);} to{opacity:1;transform:translateY(0);} }

/* Date card */
.date-card{
    background:#111827; padding:20px 25px; border-radius:18px;
    margin-bottom:20px; display:flex; align-items:center; gap:20px;
    border:1px solid rgba(255,255,255,.05);
}
.date-card label{ color:#94a3b8; font-size:14px; font-weight:500; }
.date-card input[type="date"]{
    padding:10px 16px; border:1px solid rgba(255,255,255,.1);
    border-radius:10px; background:#1f2937; color:white;
    font-family:'Poppins',sans-serif; font-size:14px; transition:.3s;
}
.date-card input[type="date"]:focus{ outline:none; border-color:#22c55e; }

/* Stats */
.stats{ display:grid; grid-template-columns:repeat(3,1fr); gap:15px; margin-bottom:25px; }
.stat{
    background:#111827; padding:22px 25px; border-radius:18px;
    border-left:4px solid #22c55e; transition:.3s;
    display:flex; align-items:center; gap:15px;
}
.stat:nth-child(2){ border-color:#38bdf8; }
.stat:nth-child(3){ border-color:#a78bfa; }
.stat:hover{ transform:translateY(-5px); box-shadow:0 8px 25px rgba(34,197,94,0.1); }
.stat-icon{ font-size:26px; }
.stat h2{ font-size:26px; font-weight:700; color:#22c55e; }
.stat:nth-child(2) h2{ color:#38bdf8; }
.stat:nth-child(3) h2{ color:#a78bfa; }
.stat p{ color:#94a3b8; font-size:13px; margin-top:2px; }

/* Search */
.search-wrap{ position:relative; margin-bottom:20px; }
.search-wrap input{
    width:100%; padding:14px 20px 14px 48px;
    border:1px solid rgba(255,255,255,.08); border-radius:12px;
    background:#111827; color:white; font-size:14px; transition:.3s;
}
.search-wrap input:focus{ outline:none; border-color:#22c55e; box-shadow:0 0 0 3px rgba(34,197,94,0.1); }
.search-wrap input::placeholder{ color:#4b5563; }
.search-icon{ position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#4b5563; font-size:18px; }

/* Table */
.attendance-card{ background:#111827; padding:25px; border-radius:18px; border:1px solid rgba(255,255,255,.05); }

table{ width:100%; border-collapse:collapse; }
th{ color:#94a3b8; font-size:12px; text-transform:uppercase; letter-spacing:1px; padding:12px 15px; border-bottom:1px solid rgba(255,255,255,.08); }
td{ padding:13px 15px; border-bottom:1px solid rgba(255,255,255,.04); vertical-align:middle; }
tbody tr{ transition:.2s; }
tbody tr:hover{ background:rgba(34,197,94,0.04); }
tbody tr:last-child td{ border-bottom:none; }

.roll-badge{
    background:rgba(56,189,248,0.1); color:#38bdf8;
    padding:4px 10px; border-radius:20px; font-size:12px;
    font-weight:600; display:inline-block;
    border:1px solid rgba(56,189,248,0.2);
}

.dept-badge{
    background:rgba(34,197,94,0.1); color:#22c55e;
    padding:4px 10px; border-radius:20px; font-size:12px;
    font-weight:500; display:inline-block;
}

.status-select{
    padding:8px 14px; border-radius:10px;
    background:#1f2937; color:white;
    border:1px solid rgba(255,255,255,.1);
    font-family:'Poppins',sans-serif; font-size:13px;
    cursor:pointer; transition:.2s; min-width:110px;
}
.status-select:focus{ outline:none; border-color:#22c55e; }
.status-select option{ background:#1f2937; }

.save-btn{
    margin-top:20px;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white; border:none; padding:14px 30px;
    border-radius:12px; font-weight:600; cursor:pointer;
    font-size:15px; transition:.3s;
    box-shadow:0 4px 15px rgba(34,197,94,0.3);
    font-family:'Poppins',sans-serif;
}
.save-btn:hover{ transform:translateY(-3px); box-shadow:0 8px 25px rgba(34,197,94,0.4); }

#noResults{ display:none; text-align:center; color:#4b5563; padding:40px; font-size:15px; }
</style>
</head>
<body>

<div class="sidebar">
    <h2>SMS PRO</h2>
    <a href="/">Dashboard</a>
    <a href="/students">Students</a>
    <a href="/attendance" class="active">Attendance</a>
    <a href="/courses">Courses</a>
    <a href="/teachers">Teachers</a>
    <a href="/reports">Reports</a>
    <a href="/login" class="logout">Logout</a>
</div>

<div class="main">

    @if(session('success'))
        <div class="success-box" id="msg">✅ {{ session('success') }}</div>
        <script>
            setTimeout(() => {
                const msg = document.getElementById('msg');
                if(msg) msg.style.display = 'none';
            }, 3000);
        </script>
    @endif

    <div class="page-header">
        <h1>Attendance Management</h1>
    </div>

    <form action="/attendance/store" method="POST">
    @csrf

    <div class="date-card">
        <span>📅</span>
        <label>Select Date</label>
        <input type="date" name="attendance_date" value="{{ $date }}" required>
    </div>

    <div class="stats">
        <div class="stat">
            <div class="stat-icon">👨‍🎓</div>
            <div>
                <h2>{{ $students->count() }}</h2>
                <p>Total Students</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat-icon">✅</div>
            <div>
                <h2>{{ $presentToday }}</h2>
                <p>Present Today</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat-icon">📊</div>
            <div>
                <h2>{{ $attendanceRate }}%</h2>
                <p>Attendance Rate</p>
            </div>
        </div>
    </div>

    <div class="search-wrap">
        <span class="search-icon">🔍</span>
        <input type="text" id="searchInput" placeholder="Search by student name, roll no or department...">
    </div>

    <div class="attendance-card">
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Roll No</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="attendanceTable">
                @foreach($students as $student)
                <tr>
                    <td><strong>{{ $student->name }}</strong></td>
                    <td><span class="roll-badge">{{ $student->roll_no }}</span></td>
                    <td><span class="dept-badge">{{ $student->department }}</span></td>
                    <td>
                        <select class="status-select" name="status[{{ $student->id }}]">
                            <option value="Present">✅ Present</option>
                            <option value="Absent">❌ Absent</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="noResults">No student found matching your search.</div>

        <button type="submit" class="save-btn">💾 Save Attendance</button>
    </div>

    </form>

</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const rows        = document.querySelectorAll('#attendanceTable tr');
    const noResults   = document.getElementById('noResults');

    searchInput.addEventListener('keyup', function () {
        const query = this.value.toLowerCase();
        let visibleCount = 0;

        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            if (text.includes(query)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    });
</script>

</body>
</html>