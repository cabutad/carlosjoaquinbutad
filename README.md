# Tasks for Today Management System

A web-based task management application built with **CodeIgniter 4** for the Web System Technologies course (IT0049).

## Developer

**Carlos Joaquin Butad**

## Table of Contents

- [Features](#features)
- [Demo Credentials](#demo-credentials)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Routes](#routes)
- [Project Structure](#project-structure)
- [Technical Details](#technical-details)

## Features

- **Welcome Dashboard** (`/`) — Displays only non-archived tasks scheduled for today
- **All Tasks List** (`/tasks`) — Shows all non-archived tasks in the system, ordered by date
- **Full CRUD for Tasks** — Create, read, update, and soft-delete tasks (login required for write actions)
- **Authentication** — Login (`/login`) and logout (`/logout`) with session-based access control
- **Soft Deletion** — Deleting a task sets `is_archived = true` instead of permanently removing the row
- **User Profile** (`/profile`) — Displays the demo user's information
- **About Page** (`/about`) — Identifies the developer of the system

## Demo Credentials

| Username | Password  |
| -------- | --------- |
| `admin`  | `admin123`|

## Requirements

- PHP 8.2 or newer
- Composer 2.0 or newer
- MySQL / MariaDB
- Apache with `mod_rewrite` enabled (or Nginx equivalent)

## Installation

1. Clone this repository:

```bash
git clone https://github.com/cabutad/carlosjoaquinbutad.git my-ci4-app
cd my-ci4-app
```

2. Install Composer dependencies:

```bash
composer install
```

3. Configure the `.env` file with your database credentials:

```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/my-ci4-app/'

database.default.hostname = localhost
database.default.database = tasks_today
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306

encryption.key = 'base64:5X2Z8yQ4R7vN3wP9kLmJcFbHnDtG6sA1eU0oY5xI2rE8='
```

## Database Setup

1. Create the database in MySQL:

```sql
CREATE DATABASE IF NOT EXISTS tasks_today;
```

2. Run the migrations:

```bash
php spark migrate
```

3. Seed the database with sample data:

```bash
php spark db:seed TaskSeeder
php spark db:seed UserSeeder
```

This will create:
- **tasks** table with 9 sample records spanning 3 different dates (including today), plus an `is_archived` column (default false)
- **users** table with 1 demo user record (username: `admin`, password: `admin123` — hashed with `password_hash()`)

Alternatively, you can import the included SQL backup directly:

```bash
mysql -u root tasks_today < tasks_today_backup.sql
```

## Routes

|    Route    |  Controller  | Description |
|-------------|--------------|-------------|
| `/` | `Home::index` | Welcome page — shows today's non-archived tasks |
| `/tasks` | `Tasks::index` | Full task list — non-archived tasks ordered by date |
| `/login` | `AuthController::login` | Login page (GET) / Process login (POST) |
| `/logout` | `AuthController::logout` | Log out and redirect to home |
| `/tasks/new` | `Tasks::create` | New task form (requires login) |
| `/tasks/store` | `Tasks::store` | Create task (POST, requires login) |
| `/tasks/edit/(:num)` | `Tasks::edit` | Edit task form (requires login) |
| `/tasks/update/(:num)` | `Tasks::update` | Update task (POST, requires login) |
| `/tasks/delete/(:num)` | `Tasks::delete` | Soft-delete a task (requires login) |
| `/profile` | `Profile::index` | User profile page (public) |
| `/about` | `About::index` | About page — developer information (public) |

### Access Control

- **Public pages** (no login required): Welcome, All Tasks, Profile, About, Login
- **Protected actions** (login required): Create task, Edit task, Update task, Delete (archive) task, Logout
- When a logged-out user attempts to access a protected action, they are redirected to `/login`.

## Project Structure

```
my-ci4-app/
├── app/
│   ├── Config/
│   │   ├── App.php
│   │   ├── Encryption.php      (encryption key configured)
│   │   ├── Filters.php          (AuthFilter registered)
│   │   └── Routes.php
│   ├── Controllers/
│   │   ├── AuthController.php   (login, authenticate, logout)
│   │   ├── Home.php             (Welcome page — today's tasks)
│   │   ├── Tasks.php            (Full CRUD: index, create, store, edit, update, delete)
│   │   ├── Profile.php          (User profile)
│   │   └── About.php            (About page)
│   ├── Filters/
│   │   └── AuthFilter.php       (redirects unauthenticated users to login)
│   ├── Models/
│   │   ├── TaskModel.php        (CRUD, validation, soft delete, date filtering)
│   │   └── UserModel.php        (findByUsername, getDemoUser)
│   ├── Database/
│   │   ├── Migrations/
│   │   │   ├── 2024-01-01-000001_CreateTasksTable.php
│   │   │   └── 2024-01-01-000002_CreateUsersTable.php
│   │   └── Seeds/
│   │       ├── TaskSeeder.php
│   │       └── UserSeeder.php
│   └── Views/
│       ├── auth/
│       │   └── login.php         (Login form with demo credentials hint)
│       ├── pages/
│       │   ├── welcome.php       (Dashboard with task cards)
│       │   └── about.php         (About page)
│       ├── profile/
│       │   └── index.php         (Profile page)
│       └── tasks/
│           ├── index.php         (Task list table with action buttons)
│           ├── new.php           (Create task form)
│           └── edit.php          (Edit task form)
├── public/
│   └── .htaccess
├── tasks_today_backup.sql        (Database export with full schema + data)
├── .env.example                   (Environment template)
├── .env                          (Environment — not committed to git)
└── composer.json
```

## Technical Details

- **Framework:** CodeIgniter 4.7.4
- **Database:** MySQL with Query Builder
- **Architecture:** MVC (Model-View-Controller)
- **Authentication:** Session-based — `password_hash()` / `password_verify()` for password security
- **Soft Deletion:** Tasks use an `is_archived` boolean column (default false) instead of physical deletion. The `TaskModel::softDelete()` method sets the flag, and `getTodayTasks()` / `getAllTasks()` exclude archived records.
- **Validation:** Form validation enforces `title` (required, min 3 chars, max 150 chars) and `task_date` (required, valid date). Rules are defined in `TaskModel` and enforced in `TasksController`.
- **Access Control:** A custom `AuthFilter` checks `session('isLoggedIn')` before every protected route. If the session is missing, the user is redirected to `/login`.
- **Date Filtering:** The Welcome page uses `TaskModel::getTodayTasks()` which filters by `task_date = '2026-09-26'` (demo fixed date).

## License

This project is submitted for academic purposes as part of IT0049 - Web System Technologies.
