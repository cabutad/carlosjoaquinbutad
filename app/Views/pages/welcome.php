<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #333; }
        nav { background: #2563eb; padding: 1rem 2rem; display: flex; gap: 1.5rem; align-items: center; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        h1 { margin-bottom: 0.5rem; color: #1e3a5f; }
        .subtitle { color: #666; margin-bottom: 1.5rem; }
        .flash-msg { background: #d1fae5; color: #065f46; padding: 0.6rem 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem; }
        .task-card { background: #fff; border-radius: 8px; padding: 1rem 1.25rem; margin-bottom: 0.75rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); display: flex; justify-content: space-between; align-items: center; }
        .task-card .task-info { flex: 1; }
        .task-card .task-info h3 { font-weight: 600; margin-bottom: 0.25rem; }
        .task-card .task-date { font-size: 0.85rem; color: #888; }
        .badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 500; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-completed { background: #d1fae5; color: #065f46; }
        .badge-in_progress { background: #dbeafe; color: #1e40af; }
        .task-actions { display: flex; gap: 0.5rem; }
        .task-actions a { display: inline-block; padding: 0.3rem 0.7rem; border-radius: 4px; font-size: 0.8rem; text-decoration: none; border: 1px solid #ddd; }
        .task-actions a.edit { color: #2563eb; border-color: #2563eb; }
        .task-actions a.delete { color: #dc2626; border-color: #fca5a5; }
        .action-btn { display: inline-block; background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 500; margin-bottom: 1rem; }
        .action-btn:hover { background: #1d4ed8; }
        .empty-state { text-align: center; padding: 2rem; color: #888; }
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
        <h1>Tasks for Today</h1>
        <p class="subtitle">September 26, 2026</p>

        <?php if (session('success')): ?>
            <div class="flash-msg"><?= esc(session('success')) ?></div>
        <?php endif; ?>

        <?php if (session('isLoggedIn') && session('user_id')): ?>
            <a href="/tasks/new" class="action-btn">＋ Add New Task</a>
        <?php endif; ?>

        <?php if (empty($tasks)): ?>
            <div class="empty-state">
                <p>No tasks scheduled for today.</p>
            </div>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <div class="task-card">
                    <div class="task-info">
                        <h3><?= esc($task['title']) ?></h3>
                        <div class="task-date">Created: <?= esc($task['created_at']) ?></div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                        <span class="badge badge-<?= esc($task['status']) === 'in_progress' ? 'in_progress' : esc($task['status']) ?>">
                            <?= esc(ucfirst($task['status'])) ?>
                        </span>
                        <?php if (session('isLoggedIn')): ?>
                            <div class="task-actions">
                                <a href="/tasks/edit/<?= esc($task['id']) ?>" class="edit">Edit</a>
                                <a href="/tasks/delete/<?= esc($task['id']) ?>" class="delete" onclick="return confirm('Archive this task?')">Delete</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
