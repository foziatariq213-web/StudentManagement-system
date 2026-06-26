<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Courses - SMS PRO</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*{ margin:0; padding:0; box-sizing:border-box; font-family:Poppins,sans-serif; }
body{ background:#05070f; color:#fff; display:flex; }

.sidebar{ width:260px; height:100vh; position:fixed; background:#0b1220; padding:30px; border-right:1px solid rgba(255,255,255,.08); }
.sidebar h2{ color:#22c55e; margin-bottom:25px; font-size:22px; letter-spacing:1px; }
.sidebar a{ display:block; padding:12px; color:#94a3b8; text-decoration:none; border-radius:10px; margin-bottom:8px; transition:.3s; }
.sidebar a:hover, .sidebar .active{ background:rgba(34,197,94,.15); color:#fff; }
.logout{ background:#dc2626; color:white !important; text-align:center; margin-top:20px; }

.main{ margin-left:260px; width:calc(100% - 260px); padding:40px; }

.page-header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
.page-header h1{ font-size:30px; font-weight:700; }

.add-btn{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white; text-decoration:none; padding:12px 22px;
    border-radius:12px; font-weight:600; transition:.3s;
    box-shadow:0 4px 15px rgba(34,197,94,0.3);
}
.add-btn:hover{ transform:translateY(-3px); box-shadow:0 8px 25px rgba(34,197,94,0.4); }

.stats{ display:grid; grid-template-columns:repeat(2,1fr); gap:15px; margin-bottom:25px; }
.stat{
    background:#111827; padding:22px 25px; border-radius:18px;
    border-left:4px solid #22c55e; transition:.3s;
    display:flex; align-items:center; gap:15px;
}
.stat:hover{ transform:translateY(-5px); box-shadow:0 8px 25px rgba(34,197,94,0.15); }
.stat-icon{ font-size:28px; }
.stat h2{ font-size:28px; font-weight:700; color:#22c55e; }
.stat p{ color:#94a3b8; font-size:13px; margin-top:2px; }

.search-wrap{ position:relative; margin-bottom:20px; }
.search-wrap input{
    width:100%; padding:14px 20px 14px 48px;
    border:1px solid rgba(255,255,255,.08);
    border-radius:12px; background:#111827;
    color:white; font-size:14px; transition:.3s;
}
.search-wrap input:focus{ outline:none; border-color:#22c55e; box-shadow:0 0 0 3px rgba(34,197,94,0.1); }
.search-wrap input::placeholder{ color:#4b5563; }
.search-icon{ position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#4b5563; font-size:18px; }

.table-card{ background:#111827; padding:25px; border-radius:18px; border:1px solid rgba(255,255,255,.05); }

table{ width:100%; border-collapse:collapse; }
th{ color:#94a3b8; font-size:12px; text-transform:uppercase; letter-spacing:1px; padding:12px 15px; border-bottom:1px solid rgba(255,255,255,.08); }
td{ padding:14px 15px; border-bottom:1px solid rgba(255,255,255,.04); vertical-align:middle; }
tbody tr{ transition:.2s; }
tbody tr:hover{ background:rgba(34,197,94,0.05); }
tbody tr:last-child td{ border-bottom:none; }

.code-badge{
    background:rgba(56,189,248,0.1); color:#38bdf8;
    padding:5px 12px; border-radius:20px; font-size:12px;
    font-weight:600; display:inline-block; letter-spacing:1px;
    border:1px solid rgba(56,189,248,0.2);
}

.dept-badge{
    background:rgba(34,197,94,0.1); color:#22c55e;
    padding:5px 10px; border-radius:20px; font-size:12px;
    font-weight:500; display:inline-block;
}

.credit-badge{
    background:rgba(167,139,250,0.1); color:#a78bfa;
    padding:5px 10px; border-radius:20px; font-size:12px;
    font-weight:600; display:inline-block;
    border:1px solid rgba(167,139,250,0.2);
}

.edit-btn{
    background:rgba(59,130,246,0.15); color:#60a5fa;
    padding:7px 14px; border-radius:8px; text-decoration:none;
    font-size:13px; font-weight:500; transition:.2s;
    border:1px solid rgba(59,130,246,0.3);
}
.edit-btn:hover{ background:#3b82f6; color:white; }

.delete-btn{
    background:rgba(239,68,68,0.15); color:#f87171;
    border:1px solid rgba(239,68,68,0.3);
    padding:7px 14px; border-radius:8px; cursor:pointer;
    font-size:13px; font-weight:500; transition:.2s;
}
.delete-btn:hover{ background:#ef4444; color:white; }
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

    <div class="page-header">
        <h1>Courses Management</h1>
        <a href="/courses/create" class="add-btn">+ Add Course</a>
    </div>

    <div class="stats">
        <div class="stat">
            <div class="stat-icon">📚</div>
            <div>
                <h2>{{ $totalCourses }}</h2>
                <p>Total Courses</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat-icon">🏛️</div>
            <div>
                <h2>{{ $departments }}</h2>
                <p>Departments</p>
            </div>
        </div>
    </div>

    <div class="search-wrap">
        <span class="search-icon">🔍</span>
        <input type="text" id="searchInput" placeholder="Search by course name, code or department...">
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Department</th>
                    <th>Credit Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="courseTable">
                @forelse($courses as $course)
                <tr>
                    <td><span class="code-badge">{{ $course->code }}</span></td>
                    <td><strong>{{ $course->title }}</strong></td>
                    <td><span class="dept-badge">{{ $course->department }}</span></td>
                    <td><span class="credit-badge">{{ $course->credits }} hrs</span></td>
                    <td>
                        <a href="/courses/edit/{{ $course->id }}" class="edit-btn">Edit</a>
                        <form action="/courses/delete/{{ $course->id }}" method="POST" style="display:inline">
                            @csrf
                            <button class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:#4b5563; padding:40px;">
                        No Courses Found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div id="noResults" style="display:none; text-align:center; color:#4b5563; padding:40px; font-size:15px;">
            No course found matching your search.
        </div>
    </div>

</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const rows        = document.querySelectorAll('#courseTable tr');
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