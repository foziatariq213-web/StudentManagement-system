<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students - SMS PRO</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*{ margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
body{ background:#05070f; color:white; display:flex; }

.sidebar{ width:260px; height:100vh; position:fixed; background:#0b1220; padding:30px; border-right:1px solid rgba(255,255,255,.08); }
.sidebar h2{ color:#22c55e; margin-bottom:25px; font-size:22px; letter-spacing:1px; }
.sidebar a{ display:block; color:#94a3b8; text-decoration:none; padding:12px; border-radius:10px; margin-bottom:8px; transition:.3s; }
.sidebar a:hover, .sidebar .active{ background:rgba(34,197,94,.15); color:white; }
.logout{ background:#dc2626; color:white !important; text-align:center; margin-top:20px; }
.logout:hover{ background:#b91c1c !important; }

.main{ margin-left:260px; width:calc(100% - 260px); padding:40px; }

.page-header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; }
.page-header h1{ font-size:30px; font-weight:700; }

.add-btn{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white; padding:12px 22px; border-radius:12px;
    text-decoration:none; font-weight:600; transition:.3s;
    box-shadow:0 4px 15px rgba(34,197,94,0.3);
}
.add-btn:hover{ transform:translateY(-3px); box-shadow:0 8px 25px rgba(34,197,94,0.4); }

/* Search */
.search-box{ margin-bottom:20px; }
.search-box form{ display:flex; gap:12px; }
.search-box input{
    flex:1; padding:14px 20px;
    border:1px solid rgba(255,255,255,.08); border-radius:12px;
    background:#111827; color:white; font-size:14px;
    font-family:'Poppins',sans-serif; transition:.3s;
}
.search-box input:focus{ outline:none; border-color:#22c55e; box-shadow:0 0 0 3px rgba(34,197,94,0.1); }
.search-box input::placeholder{ color:#4b5563; }
.search-btn{
    background:linear-gradient(135deg,#22c55e,#16a34a);
    color:white; border:none; padding:14px 24px;
    border-radius:12px; cursor:pointer; font-weight:600;
    font-family:'Poppins',sans-serif; transition:.3s;
    box-shadow:0 4px 15px rgba(34,197,94,0.3);
}
.search-btn:hover{ transform:translateY(-2px); box-shadow:0 8px 25px rgba(34,197,94,0.4); }

/* Table */
.table-card{ background:#111827; padding:25px; border-radius:18px; border:1px solid rgba(255,255,255,.05); }

table{ width:100%; border-collapse:collapse; }
th{ color:#94a3b8; font-size:12px; text-transform:uppercase; letter-spacing:1px; padding:12px 15px; border-bottom:1px solid rgba(255,255,255,.08); }
td{ padding:13px 15px; border-bottom:1px solid rgba(255,255,255,.04); vertical-align:middle; }
tbody tr{ transition:.2s; }
tbody tr:hover{ background:rgba(34,197,94,0.04); }
tbody tr:last-child td{ border-bottom:none; }

.avatar{
    width:42px; height:42px; border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    font-weight:700; font-size:14px; color:white;
    box-shadow:0 4px 10px rgba(0,0,0,0.3);
}

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

.contact-text{ color:#94a3b8; font-size:13px; }

.edit-btn{
    background:rgba(59,130,246,0.15); color:#60a5fa;
    padding:7px 14px; border-radius:8px; text-decoration:none;
    font-size:13px; font-weight:500; transition:.2s;
    border:1px solid rgba(59,130,246,0.3); display:inline-block;
}
.edit-btn:hover{ background:#3b82f6; color:white; }

.delete-btn{
    background:rgba(239,68,68,0.15); color:#f87171;
    border:1px solid rgba(239,68,68,0.3);
    padding:7px 14px; border-radius:8px; cursor:pointer;
    font-size:13px; font-weight:500; transition:.2s;
    font-family:'Poppins',sans-serif;
}
.delete-btn:hover{ background:#ef4444; color:white; }

/* Pagination */
.pagination{ margin-top:25px; display:flex; justify-content:center; gap:8px; flex-wrap:wrap; }
.page-btn{
    padding:9px 15px; background:#1f2937; color:white;
    text-decoration:none; border-radius:10px; transition:.3s;
    font-size:13px; font-weight:500;
}
.page-btn:hover{ background:#374151; }
.page-btn.active{ background:#22c55e; color:white; box-shadow:0 4px 12px rgba(34,197,94,0.3); }
.page-btn.disabled{ opacity:.4; pointer-events:none; }
</style>
</head>
<body>

<div class="sidebar">
    <h2>SMS PRO</h2>
    <a href="/">Dashboard</a>
    <a href="/students" class="active">Students</a>
    <a href="/attendance">Attendance</a>
    <a href="/courses">Courses</a>
    <a href="/teachers">Teachers</a>
    <a href="/reports">Reports</a>
    <a href="/login" class="logout">Logout</a>
</div>

<div class="main">

    <div class="page-header">
        <h1>Students List</h1>
        <a href="/students/create" class="add-btn">+ Add Student</a>
    </div>

    <div class="search-box">
        <form action="/students" method="GET">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="🔍 Search by name, roll no or department...">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </div>

    @php
        $colors = ['#6366f1','#ec4899','#f59e0b','#14b8a6','#ef4444','#8b5cf6','#22c55e','#f97316','#0ea5e9','#d946ef'];
    @endphp

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Department</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $index => $student)
                <tr>
                    <td>
                        <div class="avatar" style="background:{{ $colors[$index % count($colors)] }}">
                            {{ strtoupper(substr($student->name, 0, 1)) }}{{ strtoupper(substr(strrchr($student->name, ' '), 1, 1)) }}
                        </div>
                    </td>
                    <td><strong>{{ $student->name }}</strong></td>
                    <td><span class="roll-badge">{{ $student->roll_no }}</span></td>
                    <td><span class="dept-badge">{{ $student->department }}</span></td>
                    <td><span class="contact-text">{{ $student->contact }}</span></td>
                    <td>
                        <a href="/students/edit/{{ $student->id }}" class="edit-btn">Edit</a>
                        <form action="/students/delete/{{ $student->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Delete Student?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:#4b5563; padding:40px;">
                        No Students Found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            @if($students->onFirstPage())
                <span class="page-btn disabled">← Previous</span>
            @else
                <a href="{{ $students->previousPageUrl() }}" class="page-btn">← Previous</a>
            @endif

            @for($i = 1; $i <= $students->lastPage(); $i++)
                <a href="{{ $students->url($i) }}"
                   class="page-btn {{ $students->currentPage() == $i ? 'active' : '' }}">
                    {{ $i }}
                </a>
            @endfor

            @if($students->hasMorePages())
                <a href="{{ $students->nextPageUrl() }}" class="page-btn">Next →</a>
            @else
                <span class="page-btn disabled">Next →</span>
            @endif
        </div>

    </div>

</div>

</body>
</html>