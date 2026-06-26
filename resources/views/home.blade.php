<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SMS PRO - Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
:root { 
    /* Yahan background color ko thoda aur dark (deeper premium dark) kiya hai */
    --bg: #030712; 
    --sidebar-bg: #0b0f19;
    --card-bg: rgba(17, 24, 39, 0.7); 
    --border: rgba(255, 255, 255, 0.05); 
    --blue: #38bdf8; 
    --green: #10b981;
    --purple: #8b5cf6;
    --amber: #f59e0b;
    --text-main: #f8fafc;
    --text-muted: #94a3b8;
}

* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }

body { 
    background: radial-gradient(circle at 50% 0%, #0f172a 0%, var(--bg) 80%);
    color: var(--text-main); 
    display: flex; 
    overflow-x: hidden; 
    min-height: 100vh;
}

/* Sidebar Styling */
.sidebar { 
    width: 260px; 
    height: 100vh; 
    position: fixed; 
    background: var(--sidebar-bg); 
    padding: 30px 20px; 
    border-right: 1px solid var(--border); 
    display: flex;
    flex-direction: column;
}

.logo {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 35px;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 10px;
    padding-left: 10px;
}

.logo span { color: var(--green); }

.sidebar-menu {
    display: flex;
    flex-direction: column;
    gap: 5px;
    flex-grow: 1;
}

.sidebar a { 
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px; 
    text-decoration: none; 
    color: var(--text-muted); 
    border-radius: 12px; 
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
    font-weight: 500;
    font-size: 14px;
}

.sidebar a i { width: 18px; height: 18px; }

.sidebar a:hover, .sidebar a.active { 
    background: rgba(56, 189, 248, 0.08); 
    color: var(--blue); 
}

.sidebar a.active {
    background: rgba(56, 189, 248, 0.12);
    box-shadow: inset 4px 0 0 var(--blue);
}

.logout { 
    margin-top: auto;
    background: rgba(239, 68, 68, 0.1) !important; 
    color: #ef4444 !important; 
    border: 1px solid rgba(239, 68, 68, 0.2);
}

.logout:hover { 
    background: #ef4444 !important; 
    color: #fff !important; 
    box-shadow: 0 10px 20px rgba(239, 68, 68, 0.2);
}

/* Main Content Styling */
.main { margin-left: 260px; width: calc(100% - 260px); padding: 40px; }

.section-title {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-muted);
    margin-bottom: 20px;
    letter-spacing: 0.5px;
}

/* Welcome Banner */
.hero { 
    background: linear-gradient(135deg, #059669 0%, #10b981 100%); 
    padding: 30px; 
    border-radius: 20px; 
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.15);
    position: relative;
    overflow: hidden;
}

.hero h1 { font-size: 28px; font-weight: 700; }
.hero p { color: rgba(255, 255, 255, 0.8); margin-top: 5px; font-size: 14px; }

/* Grid Structures */
.stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px; }

.stat { 
    background: var(--card-bg); 
    backdrop-filter: blur(12px);
    padding: 24px; 
    border-radius: 16px; 
    border: 1px solid var(--border);
    position: relative;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.stat:hover { 
    transform: translateY(-5px); 
    border-color: rgba(255,255,255,0.1);
    box-shadow: 0 15px 30px rgba(0,0,0,0.4); 
}

.stat h2 { font-size: 32px; font-weight: 700; margin-bottom: 5px; }
.stat p { color: var(--text-muted); font-size: 14px; font-weight: 500; }

.stat::after {
    content: '';
    position: absolute;
    top: 0; left: 24px; right: 24px; height: 3px;
    border-radius: 0 0 4px 4px;
}
.stat.blue::after { background: var(--blue); }
.stat.purple::after { background: var(--purple); }
.stat.green::after { background: var(--green); }
.stat.amber::after { background: var(--amber); }

/* System Functions */
.functions { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px; }

.func { 
    background: var(--card-bg); 
    backdrop-filter: blur(12px);
    padding: 24px; 
    border-radius: 16px; 
    border: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: all 0.3s;
}

.func:hover {
    transform: translateY(-4px);
    border-color: rgba(56, 189, 248, 0.25);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
}

.func-icon {
    width: 48px; height: 48px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
}
.func.blue .func-icon { background: rgba(56, 189, 248, 0.1); color: var(--blue); }
.func.green .func-icon { background: rgba(16, 185, 129, 0.1); color: var(--green); }
.func.purple .func-icon { background: rgba(139, 92, 246, 0.1); color: var(--purple); }

.func h3 { font-size: 16px; font-weight: 600; margin-bottom: 2px; }
.func p { color: var(--text-muted); font-size: 13px; }

/* Analytics section */
.analytics { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }

.chart-card { 
    background: var(--card-bg); 
    backdrop-filter: blur(12px);
    padding: 24px; 
    border-radius: 20px; 
    border: 1px solid var(--border); 
    transition: all 0.3s; 
}

.chart-card h3 { font-size: 16px; font-weight: 600; margin-bottom: 20px; color: var(--text-main); }
.full { grid-column: 1 / -1; }
canvas { width: 100% !important; max-height: 280px; }
</style>
</head>
<body>

<div class="sidebar">
    <h1 class="logo">
        <i data-lucide="graduation-cap" style="color: var(--blue);"></i> SMS <span>PRO</span>
    </h1>
    <div class="sidebar-menu">
        <a href="/" class="active"><i data-lucide="layout-dashboard"></i> Dashboard</a>
        <a href="/students"><i data-lucide="users"></i> Students</a>
        <a href="/attendance"><i data-lucide="calendar-check"></i> Attendance</a>
        <a href="/courses"><i data-lucide="book-open"></i> Courses</a>
        <a href="/teachers"><i data-lucide="user-check"></i> Teachers</a>
        <a href="/reports"><i data-lucide="bar-chart-3"></i> Reports</a>
        <a href="/login" class="logout"><i data-lucide="log-out"></i> Logout</a>
    </div>
</div>

<div class="main">

    <div class="hero">
        <h1>Welcome Back, Administrator</h1>
        <p>Here's what's happening with your institution today.</p>
    </div>

    
 <h2 class="section-title">Overview Statistics</h2>

<div class="stats">

    <div class="stat blue">
        <h2>{{ $totalStudents }}</h2>
        <p>Total Students</p>
    </div>

    <div class="stat purple">
        <h2>{{ $departmentCount }}</h2>
        <p>Departments</p>
    </div>

    <div class="stat green">
        <h2>{{ $attendanceRate }}%</h2>
        <p>Attendance Rate</p>
    </div>

    <div class="stat amber">
        <h2>{{ $totalTeachers }}</h2>
        <p>Active Teachers</p>
    </div>

</div>

    <h2 class="section-title">Quick Actions</h2>
    <div class="functions">
        <div class="func blue">
            <div class="func-icon"><i data-lucide="user-plus"></i></div>
            <div>
                <h3>Enrollment</h3>
                <p>Register new students</p>
            </div>
        </div>
        <div class="func green">
            <div class="func-icon"><i data-lucide="check-square"></i></div>
            <div>
                <h3>Attendance</h3>
                <p>Track daily presence</p>
            </div>
        </div>
        <div class="func purple">
            <div class="func-icon"><i data-lucide="award"></i></div>
            <div>
                <h3>Performance</h3>
                <p>Manage CGPA & Grades</p>
            </div>
        </div>
    </div>

    <h2 class="section-title">Analytics Dashboard</h2>
    <div class="analytics">
        <div class="chart-card">
            <h3>Student Distribution by Dept</h3>
            <canvas id="pie"></canvas>
        </div>
        <div class="chart-card">
            <h3>Attendance Performance</h3>
            <canvas id="bar"></canvas>
        </div>
        <div class="chart-card full">
            <h3>Monthly Admission Trends</h3>
            <canvas id="line"></canvas>
        </div>
    </div>

</div>

<script>
lucide.createIcons();

const chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            labels: {
                color: '#94a3b8',
                font: {
                    family: 'Plus Jakarta Sans',
                    size: 12
                }
            }
        }
    },
    scales: {
        x: {
            grid: { display: false },
            ticks: { color: '#64748b' }
        },
        y: {
            grid: { color: 'rgba(255,255,255,0.02)' },
            ticks: { color: '#64748b' }
        }
    }
};

// ================= PIE CHART =================
new Chart(document.getElementById('pie'), {
    type: 'doughnut',
    data: {
        labels: @json($departmentData->pluck('department')),
        datasets: [{
            data: @json($departmentData->pluck('total')),
            backgroundColor: [
                '#38bdf8',
                '#8b5cf6',
                '#10b981',
                '#f59e0b',
                '#ef4444',
                '#14b8a6'
            ],
            borderWidth: 0,
            hoverOffset: 12
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    color: '#94a3b8',
                    font: {
                        family: 'Plus Jakarta Sans'
                    }
                }
            }
        }
    }
});

// ================= BAR CHART =================
new Chart(document.getElementById('bar'), {
    type: 'bar',
    data: {
        labels: @json($departmentData->pluck('department')),
        datasets: [{
            label: 'Students',
            data: @json($departmentData->pluck('total')),
            backgroundColor: '#38bdf8',
            borderRadius: 6
        }]
    },
    options: chartOptions
});

// ================= LINE CHART =================
new Chart(document.getElementById('line'), {
    type: 'line',
    data: {
        labels: @json($months),
        datasets: [{
            label: 'Admissions',
            data: @json($admissions),
            borderColor: '#38bdf8',
            backgroundColor: 'rgba(56,189,248,0.03)',
            fill: true,
            tension: 0.4,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    },
    options: chartOptions
});
</script>

</body>
</html>