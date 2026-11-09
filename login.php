<?php
require __DIR__ . '/auth.php';

session_start();

if (isset($_SESSION['user'])) {
    redirect('dashboard.php');
}

$message = $_SESSION['flash']['message'] ?? '';
$type = $_SESSION['flash']['type'] ?? 'info';
unset($_SESSION['flash']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Laptop Store Uganda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Laptop Store</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    </nav>

    <main class="page-shell">
        <div class="form-container">
            <h2>Login</h2>
            <p>Login to access your account and track purchases.</p>

            <?php if ($message): ?>
                <div class="flash flash-<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <form action="login_process.php" method="POST" novalidate>
                <label for="email">Email Address</label>
                <input id="email" name="email" type="email" placeholder="Email Address" required>

                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" required>

                <button type="submit">Login</button>
            </form>

            <p class="form-link">
                Need an account?
                <a href="register.php">Create one</a>
            </p>
        </div>
    </main>
</body>
</html>
