<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teachers - SMS PRO</title>
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

.page-header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
.page-header h1{ font-size:30px; font-weight:700; }

.add-btn{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white; padding:12px 22px; border-radius:12px;
    text-decoration:none; font-weight:600; transition:.3s;
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
.search-icon{
    position:absolute; left:16px; top:50%;
    transform:translateY(-50%); color:#4b5563; font-size:18px;
}

.table-card{ background:#111827; padding:25px; border-radius:18px; border:1px solid rgba(255,255,255,.05); }

table{ width:100%; border-collapse:collapse; }
th{ color:#94a3b8; font-size:12px; text-transform:uppercase; letter-spacing:1px; padding:12px 15px; border-bottom:1px solid rgba(255,255,255,.08); }
td{ padding:14px 15px; border-bottom:1px solid rgba(255,255,255,.04); vertical-align:middle; }
tbody tr{ transition:.2s; }
tbody tr:hover{ background:rgba(34,197,94,0.05); }
tbody tr:last-child td{ border-bottom:none; }

.avatar{
    width:42px; height:42px; border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-weight:700; font-size:14px; color:white;
    box-shadow:0 4px 10px rgba(0,0,0,0.3);
}

.dept-badge{
    background:rgba(34,197,94,0.1); color:#22c55e;
    padding:5px 10px; border-radius:20px; font-size:12px; font-weight:500;
    display:inline-block;
}

.qual-text{ color:#94a3b8; font-size:13px; }
.phone-text{ color:#38bdf8; font-size:13px; }

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

.no-results{ text-align:center; color:#4b5563; padding:40px; font-size:15px; }
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

    <div class="page-header">
        <h1>Teachers Management</h1>
        <a href="/teachers/create" class="add-btn">+ Add Teacher</a>
    </div>

    <div class="stats">
        <div class="stat">
            <div class="stat-icon">👨‍🏫</div>
            <div>
                <h2>{{ $totalTeachers }}</h2>
                <p>Total Teachers</p>
            </div>
        </div>
        <div class="stat">
            <div class="stat-icon">🏛️</div>
            <div>
                <h2>{{ $totalDepartments }}</h2>
                <p>Departments</p>
            </div>
        </div>
    </div>

    {{-- Search Box --}}
    <div class="search-wrap">
        <span class="search-icon">🔍</span>
        <input type="text" id="searchInput" placeholder="Search by name, department or qualification...">
    </div>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Qualification</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="teacherTable">

                @php
                    $colors = ['#6366f1','#ec4899','#f59e0b','#14b8a6','#ef4444','#8b5cf6','#22c55e','#f97316','#0ea5e9','#d946ef'];
                @endphp

                @forelse($teachers as $index => $teacher)
                <tr>
                    <td>
                        <div class="avatar" style="background:{{ $colors[$index % count($colors)] }}">
                            {{ strtoupper(substr($teacher->name, 0, 1)) }}{{ strtoupper(substr(strrchr($teacher->name, ' '), 1, 1)) }}
                        </div>
                    </td>
                    <td><strong>{{ $teacher->name }}</strong></td>
                    <td><span class="dept-badge">{{ $teacher->department }}</span></td>
                    <td><span class="qual-text">{{ $teacher->qualification }}</span></td>
                    <td><span class="phone-text">{{ $teacher->phone }}</span></td>
                    <td>
                        <a href="/teachers/edit/{{ $teacher->id }}" class="edit-btn">Edit</a>
                        <form action="/teachers/delete/{{ $teacher->id }}" method="POST" style="display:inline">
                            @csrf
                            <button class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="no-results">No Teachers Found</td>
                </tr>
                @endforelse

            </tbody>
        </table>

        {{-- No results message for search --}}
        <div id="noResults" style="display:none; text-align:center; color:#4b5563; padding:40px; font-size:15px;">
            No teacher found matching your search.
        </div>
    </div>

</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const rows        = document.querySelectorAll('#teacherTable tr');
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