<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - Tasks for Today</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #333; }
        nav { background: #2563eb; padding: 1rem 2rem; display: flex; gap: 1.5rem; align-items: center; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 600px; margin: 2rem auto; padding: 0 1rem; }
        h1 { margin-bottom: 0.5rem; color: #1e3a5f; }
        .subtitle { color: #666; margin-bottom: 1.5rem; }
        .form-card { background: #fff; border-radius: 8px; padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; margin-bottom: 0.35rem; font-weight: 500; color: #555; }
        .form-group input, .form-group select { width: 100%; padding: 0.6rem 0.75rem; border: 1px solid #ddd; border-radius: 6px; font-size: 0.95rem; }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1); }
        .btn { display: inline-block; padding: 0.6rem 1.5rem; border-radius: 6px; font-weight: 500; cursor: pointer; border: none; transition: background 0.2s; margin-right: 0.5rem; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-secondary { background: #e5e7eb; color: #374151; }
        .btn-secondary:hover { background: #d1d5db; }
        .error-msg { color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; }
        footer { text-align: center; padding: 2rem; color: #999; font-size: 0.9rem; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
        <a href="/tasks/new">New Task</a>
        <a href="/logout">Logout</a>
    </nav>

    <div class="container">
        <h1>Edit Task</h1>
        <p class="subtitle">Update task details</p>

        <div class="form-card">
            <form method="post" action="/tasks/update/<?= esc($task['id']) ?>">
                <div class="form-group">
                    <label for="title">Title *</label>
                    <input type="text" id="title" name="title" value="<?= set_value('title', $task['title']) ?>" required>
                    <?php if (isset($validation) && $validation->hasError('title')): ?>
                        <div class="error-msg"><?= esc($validation->getError('title')) ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="task_date">Task Date *</label>
                    <input type="date" id="task_date" name="task_date" value="<?= set_value('task_date', $task['task_date']) ?>" required>
                    <?php if (isset($validation) && $validation->hasError('task_date')): ?>
                        <div class="error-msg"><?= esc($validation->getError('task_date')) ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="pending" <?= set_select('status', 'pending', $task['status'] === 'pending') ?>>Pending</option>
                        <option value="in_progress" <?= set_select('status', 'in_progress', $task['status'] === 'in_progress') ?>>In Progress</option>
                        <option value="completed" <?= set_select('status', 'completed', $task['status'] === 'completed') ?>>Completed</option>
                    </select>
                </div>
                <div style="display: flex; gap: 0.5rem;">
                    <button type="submit" class="btn btn-primary">Update Task</button>
                    <a href="/tasks" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
