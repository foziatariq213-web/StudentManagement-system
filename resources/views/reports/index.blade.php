<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reports - SMS PRO</title>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
:root { 
    /* Ultra dark solid premium workspace background */
    --bg: #02040a; 
    --sidebar-bg: #070b13;
    --card-bg: rgba(13, 19, 33, 0.85); 
    --border: rgba(255, 255, 255, 0.04); 
    --blue: #38bdf8; 
    --green: #10b981;
    --purple: #8b5cf6;
    --amber: #f59e0b;
    --red: #ef4444;
    --text-main: #f8fafc;
    --text-muted: #94a3b8;
}

* { 
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
    font-family: 'Plus Jakarta Sans', sans-serif; 
}

body { 
    background: radial-gradient(circle at 50% 0%, #0b1324 0%, var(--bg) 85%);
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
    background: rgba(16, 185, 129, 0.08); 
    color: var(--green); 
}

.sidebar a.active {
    background: rgba(16, 185, 129, 0.12);
    box-shadow: inset 4px 0 0 var(--green);
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

.header { 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    margin-bottom: 35px; 
}

.header h1 { font-size: 28px; font-weight: 700; letter-spacing: -0.5px; }

.export-btn { 
    background: linear-gradient(135deg, #059669 0%, #10b981 100%); 
    color: white; 
    padding: 12px 24px; 
    border-radius: 12px; 
    text-decoration: none; 
    font-weight: 600; 
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.15);
    transition: all 0.3s;
}

.export-btn:hover { 
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(16, 185, 129, 0.25);
}

/* Statistics Grid */
.stats { 
    display: grid; 
    grid-template-columns: repeat(4, 1fr); 
    gap: 20px; 
    margin-bottom: 40px; 
}

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
    border-color: rgba(255,255,255,0.08);
    box-shadow: 0 15px 30px rgba(0,0,0,0.5); 
}

.stat h2 { font-size: 32px; font-weight: 700; margin-bottom: 5px; }
.stat p { color: var(--text-muted); font-size: 14px; font-weight: 500; }

.stat::after {
    content: '';
    position: absolute;
    top: 0; left: 24px; right: 24px; height: 3px;
    border-radius: 0 0 4px 4px;
}
.stat:nth-child(1)::after { background: var(--green); }
.stat:nth-child(2)::after { background: var(--blue); }
.stat:nth-child(3)::after { background: var(--purple); }
.stat:nth-child(4)::after { background: var(--amber); }

/* Analytics Section */
.analytics { 
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    gap: 24px; 
}

.chart-card { 
    background: var(--card-bg); 
    backdrop-filter: blur(12px);
    padding: 24px; 
    border-radius: 20px; 
    border: 1px solid var(--border); 
    transition: all 0.3s; 
}

.chart-card h3 { 
    font-size: 16px; 
    font-weight: 600; 
    margin-bottom: 25px; 
    color: var(--text-main); 
}

canvas { 
    width: 100% !important; 
    max-height: 280px; 
}
</style>
</head>
<body>

<div class="sidebar">
    <h1 class="logo">
        <i data-lucide="graduation-cap" style="color: var(--green);"></i> SMS <span>PRO</span>
    </h1>
    <div class="sidebar-menu">
        <a href="/"><i data-lucide="layout-dashboard"></i> Dashboard</a>
        <a href="/students"><i data-lucide="users"></i> Students</a>
        <a href="/attendance"><i data-lucide="calendar-check"></i> Attendance</a>
        <a href="/courses"><i data-lucide="book-open"></i> Courses</a>
        <a href="/teachers"><i data-lucide="user-check"></i> Teachers</a>
        <a href="/reports" class="active"><i data-lucide="bar-chart-3"></i> Reports</a>
        <a href="/login" class="logout"><i data-lucide="log-out"></i> Logout</a>
    </div>
</div>

<div class="main">

    <div class="header">
    <h1>Reports & Analytics</h1>

    <a href="{{ route('reports.pdf') }}" class="export-btn">
        <i data-lucide="download"></i> Export PDF
    </a>
</div>

    <div class="stats">
    <div class="stat">
        <h2>{{ $totalStudents }}</h2>
        <p>Total Students</p>
    </div>

    <div class="stat">
        <h2>{{ $attendanceRate }}%</h2>
        <p>Attendance Rate</p>
    </div>

    <div class="stat">
        <h2>{{ $totalTeachers }}</h2>
        <p>Teachers</p>
    </div>

    <div class="stat">
        <h2>{{ $departmentCount }}</h2>
        <p>Departments</p>
    </div>
</div>

<div class="analytics">
    <div class="chart-card">
        <h3>Department Distribution</h3>
        <canvas id="pie"></canvas>
    </div>

    <div class="chart-card">
        <h3>Attendance Report</h3>
        <canvas id="bar"></canvas>
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
            grid: { color: 'rgba(255,255,255,0.01)' },
            ticks: { color: '#64748b' }
        }
    }
};

// ===== Pie Chart (Dynamic) =====
const pieLabels = @json($departmentData->pluck('department'));
const pieData = @json($departmentData->pluck('total'));

if (!pieLabels.length || !pieData.length) {
    console.warn('No department data found');
}

new Chart(document.getElementById('pie'), {
    type: 'doughnut',
    data: {
        labels: pieLabels,
        datasets: [{
            data: pieData,
            backgroundColor: [
                '#10b981',
                '#38bdf8',
                '#8b5cf6',
                '#f59e0b',
                '#34d399',
                '#a78bfa'
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

// ===== Bar Chart (Dynamic) =====
const barLabels = @json($attendanceData->pluck('department'));
const presentData = @json($attendanceData->pluck('present'));
const absentData = @json($attendanceData->pluck('absent'));

new Chart(document.getElementById('bar'), {
    type: 'bar',
    data: {
        labels: barLabels,
        datasets: [
            {
                label: 'Present',
                data: presentData,
                backgroundColor: '#10b981',
                borderRadius: 4
            },
            {
                label: 'Absent',
                data: absentData,
                backgroundColor: '#ef4444',
                borderRadius: 4
            }
        ]
    },
    options: chartOptions
});
</script>

</body>
</html>