<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Tasks for Today</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #333; }
        nav { background: #2563eb; padding: 1rem 2rem; display: flex; gap: 1.5rem; align-items: center; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 700px; margin: 2rem auto; padding: 0 1rem; }
        h1 { margin-bottom: 0.5rem; color: #1e3a5f; }
        .content { background: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); }
        .content p { margin-bottom: 0.75rem; line-height: 1.6; }
        .content strong { color: #1e3a5f; }
        footer { text-align: center; padding: 2rem; color: #999; font-size: 0.9rem; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
        <?php if (session('isLoggedIn')): ?>
            <a href="/tasks/new">New Task</a>
            <a href="/logout">Logout</a>
        <?php else: ?>
            <a href="/login">Login</a>
        <?php endif; ?>
    </nav>

    <div class="container">
        <h1>About This System</h1>
        <div class="content">
            <p><strong>Tasks for Today Management System</strong> is a web-based application built with <strong>CodeIgniter 4</strong> to help teams track and manage daily tasks efficiently.</p>
            <p>This system was developed as part of the <strong>Web System Technologies</strong> course (IT0049) at the College of Computer Studies and Multimedia Arts.</p>
            <p><strong>Developer:</strong> Carlos Joaquin Butad</p>
            <p><strong>Features:</strong></p>
            <ul style="margin-left: 1.5rem; margin-bottom: 1rem; line-height: 1.8;">
                <li>Dashboard showing only today's tasks</li>
                <li>Complete task list with all records</li>
                <li>Full CRUD for tasks (create, read, update, delete)</li>
                <li>User authentication (login and logout)</li>
                <li>Soft deletion — archived tasks are hidden, not removed</li>
                <li>User profile page</li>
                <li>Database-backed with MySQL migrations and seeders</li>
            </ul>
            <p>The application follows the Model-View-Controller (MVC) architecture and uses CodeIgniter's Query Builder for database operations.</p>
        </div>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
