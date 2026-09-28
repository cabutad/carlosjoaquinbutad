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
        .task-card { background: #fff; border-radius: 8px; padding: 1rem 1.25rem; margin-bottom: 0.75rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); display: flex; justify-content: space-between; align-items: center; }
        .task-card .task-info { flex: 1; }
        .task-card .task-title { font-weight: 600; margin-bottom: 0.25rem; }
        .task-card .task-date { font-size: 0.85rem; color: #888; }
        .badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 500; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-completed { background: #d1fae5; color: #065f46; }
        .badge-in_progress { background: #dbeafe; color: #1e40af; }
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
    </nav>

    <div class="container">
        <h1>Tasks for Today</h1>
        <p class="subtitle"><?= date('F j, Y') ?></p>

        <?php if (empty($tasks)): ?>
            <div class="empty-state">
                <p>No tasks scheduled for today.</p>
            </div>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <div class="task-card">
                    <div class="task-info">
                        <div class="task-title"><?= esc($task['title']) ?></div>
                        <div class="task-date">Created: <?= esc($task['created_at']) ?></div>
                    </div>
                    <span class="badge badge-<?= esc($task['status']) === 'in_progress' ? 'in_progress' : esc($task['status']) ?>">
                        <?= esc(ucfirst($task['status'])) ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
