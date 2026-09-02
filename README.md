# Student Management System 🎓

A role-protected school management web application built with **Laravel (MVC)** and **MySQL** — manage students, teachers, courses, departments, and attendance from a centralized admin dashboard, with printable PDF reports.

![Dashboard](screenshots/02-dashboard.png)

## ✨ Features

- **Student, Teacher, Course & Department management** — full CRUD with relational database design
- **Attendance tracking** — record and review attendance per student/course
- **PDF report generation** — printable academic records and attendance reports
- **Centralized dashboard** — key institutional data and administrative stats at a glance
- **Secure admin modules** — authentication + middleware-protected routes
- **Resourceful routing** — clean RESTful controller structure

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2+, Laravel 12 (MVC architecture) |
| Database | MySQL (Eloquent ORM, migrations, relationships) |
| Frontend | Blade templates, CSS |
| PDF | Laravel PDF generation |
| Tools | Composer, Git, VS Code |

## 📸 Screenshots

**Login**
![Login](screenshots/01-login.png)

**Analytics — department distribution, attendance performance & admission trends**
![Analytics](screenshots/03-analytics.png)

**Students Management**
![Students](screenshots/04-students.png)

**Attendance Tracking**
![Attendance](screenshots/05-attendance.png)

**Courses Management**
![Courses](screenshots/06-courses.png)

**Teachers Management**
![Teachers](screenshots/07-teachers.png)

**Reports & PDF Export**
![Reports](screenshots/08-reports.png)

## 🚀 Getting Started

```bash
# 1. Clone the repository
git clone https://github.com/foziatariq213-web/StudentManagement-system.git
cd StudentManagement-system

# 2. Install dependencies
composer install

# 3. Set up environment
cp .env.example .env
php artisan key:generate
# open .env and set your MySQL DB_DATABASE / DB_USERNAME / DB_PASSWORD

# 4. Run migrations (and seeders if available)
php artisan migrate --seed

# 5. Start the development server
php artisan serve
```

The app will be available at `http://localhost:8000`.

## 📂 Project Highlights

- Laravel MVC with resource controllers and route model binding
- Role-protected administrative modules via middleware
- Relational schema: students ↔ courses ↔ departments ↔ attendance
- Server-generated PDF reports for academic records

## 👩‍💻 Author

**Momina Tariq** — Junior Backend Developer (Laravel)
[LinkedIn](https://www.linkedin.com/in/momina-tariq-dev) · [GitHub](https://github.com/foziatariq213-web)
