<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tasks - Tasks for Today</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #333; }
        nav { background: #2563eb; padding: 1rem 2rem; display: flex; gap: 1.5rem; align-items: center; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        h1 { margin-bottom: 0.5rem; color: #1e3a5f; }
        .subtitle { color: #666; margin-bottom: 1.5rem; }
        table { width: 100%; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.08); border-collapse: collapse; }
        th { background: #1e3a5f; color: #fff; padding: 0.75rem 1rem; text-align: left; font-weight: 500; }
        td { padding: 0.75rem 1rem; border-bottom: 1px solid #eee; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background: #f9fafb; }
        .badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 500; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-completed { background: #d1fae5; color: #065f46; }
        .badge-in_progress { background: #dbeafe; color: #1e40af; }
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
        <h1>All Tasks</h1>
        <p class="subtitle">Complete list of all tasks in the system</p>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tasks)): ?>
                    <tr>
                        <td colspan="5" style="text-align: center; color: #888; padding: 2rem;">No tasks found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($tasks as $index => $task): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= esc($task['title']) ?></td>
                            <td>
                                <span class="badge badge-<?= esc($task['status']) === 'in_progress' ? 'in_progress' : esc($task['status']) ?>">
                                    <?= esc(ucfirst($task['status'])) ?>
                                </span>
                            </td>
                            <td><?= esc($task['task_date']) ?></td>
                            <td><?= esc($task['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
