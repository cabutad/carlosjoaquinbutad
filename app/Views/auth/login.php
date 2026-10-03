<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tasks for Today</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #333; }
        nav { background: #2563eb; padding: 1rem 2rem; display: flex; gap: 1.5rem; align-items: center; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; }
        nav a:hover { text-decoration: underline; }
        .container { max-width: 450px; margin: 3rem auto; padding: 0 1rem; }
        h1 { margin-bottom: 0.5rem; color: #1e3a5f; }
        .subtitle { color: #666; margin-bottom: 1.5rem; }
        .form-card { background: #fff; border-radius: 8px; padding: 2rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.35rem; font-weight: 500; color: #555; }
        .form-group input { width: 100%; padding: 0.6rem 0.75rem; border: 1px solid #ddd; border-radius: 6px; font-size: 0.95rem; }
        .form-group input:focus { outline: none; border-color: #2563eb; box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1); }
        .btn { display: inline-block; padding: 0.6rem 1.5rem; border-radius: 6px; font-weight: 500; cursor: pointer; border: none; transition: background 0.2s; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .error-msg { background: #fee2e2; color: #991b2b; padding: 0.6rem 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem; }
        .flash-msg { background: #d1fae5; color: #065f46; padding: 0.6rem 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem; }
        footer { text-align: center; padding: 2rem; color: #999; font-size: 0.9rem; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
        <a href="/login">Login</a>
    </nav>

    <div class="container">
        <h1>Login to Your Account</h1>
        <p class="subtitle">Demo credentials — username: <strong>admin</strong>, password: <strong>admin123</strong></p>

        <div class="form-card">
            <?php if (isset($error)): ?>
                <div class="error-msg"><?= esc($error) ?></div>
            <?php endif; ?>

            <?php if (session('error')): ?>
                <div class="error-msg"><?= esc(session('error')) ?></div>
            <?php endif; ?>

            <form method="post" action="/login">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?= set_value('username') ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Log In</button>
            </form>
        </div>
    </div>

    <footer>Tasks for Today Management System &copy; <?= date('Y') ?></footer>
</body>
</html>
