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
        .container { max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
        h1 { margin-bottom: 0.5rem; color: #1e3a5f; }
        .subtitle { color: #666; margin-bottom: 1.5rem; }
        .flash-msg { background: #d1fae5; color: #065f46; padding: 0.6rem 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem; }
        .action-btn { display: inline-block; background: #2563eb; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: 500; margin-bottom: 1rem; }
        .action-btn:hover { background: #1d4ed8; }
        table { width: 100%; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.08); border-collapse: collapse; }
        th { background: #1e3a5f; color: #fff; padding: 0.75rem 1rem; text-align: left; font-weight: 500; }
        td { padding: 0.75rem 1rem; border-bottom: 1px solid #eee; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background: #f9fafb; }
        .badge { display: inline-block; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.8rem; font-weight: 500; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-completed { background: #d1fae5; color: #065f46; }
        .badge-in_progress { background: #dbeafe; color: #1e40af; }
        .task-actions a { display: inline-block; padding: 0.2rem 0.5rem; border-radius: 4px; font-size: 0.8rem; text-decoration: none; border: 1px solid #ddd; margin-right: 0.25rem; }
        .task-actions a.edit { color: #2563eb; border-color: #2563eb; }
        .task-actions a.delete { color: #dc2626; border-color: #fca5a5; }
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
        <h1>All Tasks</h1>
        <p class="subtitle">Complete list of all tasks in the system</p>

        <?php if (session('success')): ?>
            <div class="flash-msg"><?= esc(session('success')) ?></div>
        <?php endif; ?>

        <?php if (session('isLoggedIn')): ?>
            <a href="/tasks/new" class="action-btn">＋ Add New Task</a>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Created At</th>
                    <?php if (session('isLoggedIn')): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tasks)): ?>
                    <tr>
                        <td colspan="<?= session('isLoggedIn') ? 6 : 5 ?>" style="text-align: center; color: #888; padding: 2rem;">No tasks found.</td>
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
                            <?php if (session('isLoggedIn')): ?>
                                <td class="task-actions">
                                    <a href="/tasks/edit/<?= esc($task['id']) ?>" class="edit">Edit</a>
                                    <a href="/tasks/delete/<?= esc($task['id']) ?>" class="delete" onclick="return confirm('Archive this task?')">&times;</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
