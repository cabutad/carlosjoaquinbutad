<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Tasks for Today</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #333; }
        nav { background: #2563eb; padding: 1rem 2rem; display: flex; gap: 1.5rem; align-items: center; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 600px; margin: 2rem auto; padding: 0 1rem; }
        h1 { margin-bottom: 0.5rem; color: #1e3a5f; }
        .subtitle { color: #666; margin-bottom: 1.5rem; }
        .profile-card { background: #fff; border-radius: 8px; padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); text-align: center; }
        .avatar { width: 80px; height: 80px; background: #2563eb; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 2rem; font-weight: 600; }
        .profile-card h2 { margin-bottom: 0.25rem; }
        .profile-card .username { color: #2563eb; font-weight: 500; margin-bottom: 1rem; }
        .detail-row { display: flex; justify-content: space-between; padding: 0.75rem 0; border-bottom: 1px solid #eee; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { font-weight: 500; color: #666; }
        .detail-value { color: #333; text-align: right; }
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
        <h1>User Profile</h1>
        <p class="subtitle">Demo user account</p>

        <?php if (!empty($user)): ?>
            <div class="profile-card">
                <div class="avatar">
                    <?= strtoupper(substr(esc($user['username']), 0, 1)) ?>
                </div>
                <h2><?= esc($user['full_name']) ?></h2>
                <div class="username">@<?= esc($user['username']) ?></div>

                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value"><?= esc($user['email']) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Member Since</span>
                    <span class="detail-value"><?= esc($user['created_at']) ?></span>
                </div>
            </div>
        <?php else: ?>
            <div class="profile-card" style="text-align: center; padding: 2rem;">
                <p style="color: #888;">No user record found.</p>
            </div>
        <?php endif; ?>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
