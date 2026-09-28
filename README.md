# Tasks for Today Management System

A web-based task management application built with **CodeIgniter 4** for the Web System Technologies course (IT0049).

## Developer

**Carlos Joaquin Butad**

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Routes](#routes)
- [Project Structure](#project-structure)

## Features

- **Welcome Dashboard** (`/`) — Displays only tasks scheduled for today
- **All Tasks List** (`/tasks`) — Shows every task in the system, ordered by date
- **User Profile** (`/profile`) — Displays the demo user's information
- **About Page** (`/about`) — Identifies the developer of the system

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
- **tasks** table with 9 sample records spanning 3 different dates (including today)
- **users** table with 1 demo user record

## Routes

| Route | Controller | Description |
|-------|------------|-------------|
| `/` | `Home::index` | Welcome page — shows today's tasks only |
| `/tasks` | `Tasks::index` | Full task list — all tasks ordered by date |
| `/profile` | `Profile::index` | User profile page |
| `/about` | `About::index` | About page — developer information |

## Project Structure

```
my-ci4-app/
├── app/
│   ├── Config/
│   │   ├── App.php
│   │   └── Routes.php
│   ├── Controllers/
│   │   ├── Home.php        (Welcome page — today's tasks)
│   │   ├── Tasks.php       (All tasks list)
│   │   ├── Profile.php     (User profile)
│   │   └── About.php       (About page)
│   ├── Models/
│   │   ├── TaskModel.php   (Tasks CRUD + filtering)
│   │   └── UserModel.php   (Users CRUD)
│   ├── Database/
│   │   ├── Migrations/
│   │   │   ├── 2024-01-01-000001_CreateTasksTable.php
│   │   │   └── 2024-01-01-000002_CreateUsersTable.php
│   │   └── Seeds/
│   │       ├── TaskSeeder.php
│   │       └── UserSeeder.php
│   └── Views/
│       ├── pages/
│       │   ├── welcome.php  (Dashboard template)
│       │   └── about.php    (About template)
│       ├── tasks/
│       │   └── index.php    (Task list template)
│       └── profile/
│           └── index.php    (Profile template)
├── public/
│   └── .htaccess           (URL rewriting)
├── .env                    (Environment configuration)
├── spark                   (CodeIgniter CLI)
└── composer.json
```

## Technical Details

- **Framework:** CodeIgniter 4.7.4
- **Database:** MySQL with Query Builder
- **Architecture:** MVC (Model-View-Controller)
- **Date Filtering:** The Welcome page uses `TaskModel::getTodayTasks()` which filters by `task_date = CURDATE()`
- **Ordering:** Task List orders by `task_date DESC, created_at DESC`

## License

This project is submitted for academic purposes as part of IT0049 - Web System Technologies.
