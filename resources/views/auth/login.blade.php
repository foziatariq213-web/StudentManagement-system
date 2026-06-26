<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SMS PRO - Premium Login</title>

<!-- Poppins & Inter Fonts for a cleaner corporate tech look -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', 'Poppins', sans-serif;
}

body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #030712; /* Deep modern dark theme bg */
    position: relative;
    overflow: hidden;
}

/* --- 3D Moving Mesh Background Animation --- */
.bg-animations {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 1;
    overflow: hidden;
}

.blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.45;
    animation: float3D 12s infinite alternate ease-in-out;
}

.blob-1 {
    width: 450px;
    height: 450px;
    background: radial-gradient(circle, #22c55e 0%, transparent 70%);
    top: -10%;
    left: -10%;
    animation-delay: 0s;
}

.blob-2 {
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, #0284c7 0%, transparent 70%);
    bottom: -15%;
    right: -10%;
    animation-delay: 3s;
}

/* --- Main Container --- */
.login-container {
    width: 100%;
    max-width: 440px;
    padding: 24px;
    z-index: 10;
    position: relative;
}

/* --- Glassmorphism Card with 3D Border Glow --- */
.login-card {
    background: rgba(15, 23, 42, 0.45);
    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-top: 1px solid rgba(255, 255, 255, 0.15); /* Reflective light hit */
    border-radius: 28px;
    padding: 45px 40px;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
    animation: cardIntro 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

/* --- Premium Typography & Logo --- */
.logo {
    text-align: center;
    margin-bottom: 35px;
}

.logo h1 {
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    font-size: 34px;
    font-weight: 800;
    letter-spacing: -0.5px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

/* Highlight "PRO" with a sleek tech gradient */
.logo h1 span {
    background: linear-gradient(135deg, #22c55e, #4ade80);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.logo p {
    color: #94a3b8;
    margin-top: 6px;
    font-size: 14px;
    font-weight: 400;
    letter-spacing: 0.5px;
}

/* --- Form Design --- */
.form-group {
    margin-bottom: 22px;
}

label {
    display: block;
    color: #e2e8f0;
    margin-bottom: 8px;
    font-size: 13.5px;
    font-weight: 500;
    letter-spacing: 0.3px;
}

.input-wrapper {
    position: relative;
}

input {
    width: 100%;
    padding: 15px 18px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    outline: none;
    border-radius: 14px;
    background: rgba(15, 23, 42, 0.6);
    color: #ffffff;
    font-size: 15px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

input::placeholder {
    color: #4b5563;
}

/* Focus Glow Effect */
input:focus {
    background: rgba(15, 23, 42, 0.85);
    border-color: #22c55e;
    box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.15),
                0 4px 20px rgba(34, 197, 94, 0.1);
}

/* --- Interactive CTA Button --- */
.login-btn {
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: white;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: 0.5px;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    margin-top: 10px;
}

.login-btn:hover {
    background: linear-gradient(135deg, #2dc966, #15803d);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(34, 197, 94, 0.45);
}

.login-btn:active {
    transform: translateY(1px);
}

/* --- Ultra Clean Extra Links --- */
.extra-links {
    margin-top: 25px;
    text-align: center;
}

.extra-links a {
    color: #94a3b8;
    text-decoration: none;
    font-size: 13.5px;
    font-weight: 400;
    transition: color 0.2s;
}

.extra-links a:hover {
    color: #38bdf8;
}

/* --- Animations Keyframes --- */
@keyframes cardIntro {
    from {
        opacity: 0;
        transform: translateY(40px) scale(0.97);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes float3D {
    0% {
        transform: translateY(0) scale(1) rotate(0deg);
    }
    50% {
        transform: translateY(-40px) scale(1.15) rotate(90deg);
    }
    100% {
        transform: translateY(20px) scale(0.95) rotate(180deg);
    }
}
</style>
</head>
<body>

<!-- Interactive Dynamic Background -->
<div class="bg-animations">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
</div>

<div class="login-container">
    <div class="login-card">

        <div class="logo">
            <h1>SMS <span>PRO</span></h1>
            <p>SMART STUDENT MANAGEMENT SYSTEM</p>
        </div>

        <form method="POST" action="{{ url('/login') }}">
    @csrf
    @if ($errors->any())
    <div style="
        background:#ef4444;
        color:#fff;
        padding:12px;
        border-radius:10px;
        margin-bottom:15px;
        text-align:center;
        font-size:14px;">
        {{ $errors->first() }}
    </div>
@endif

@if(session('error'))
    <div style="
        background:#ef4444;
        color:#fff;
        padding:12px;
        border-radius:10px;
        margin-bottom:15px;
        text-align:center;
        font-size:14px;">
        {{ session('error') }}
    </div>
@endif

    <div class="form-group">
        <label>Email Address</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="name@university.com"
            required
        >
    </div>

    <div class="form-group">
        <label>Password</label>
        <input
            type="password"
            name="password"
            placeholder="••••••••••••"
            required
        >
    </div>

    @if(session('error'))
        <div style="
            background:#ef4444;
            color:#fff;
            padding:12px;
            border-radius:10px;
            margin-bottom:15px;
            text-align:center;
            font-size:14px;">
            {{ session('error') }}
        </div>
    @endif

    <button type="submit" class="login-btn">
        Sign In to Dashboard
    </button>
</form>

<div class="extra-links">
    <p style="color:#94a3b8;font-size:13px;">
        Student Management System © 2026
    </p>
</div>
 </div> <!-- login-card -->
</div> 
</body>
</html>