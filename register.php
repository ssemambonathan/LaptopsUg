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
    <title>Register | Laptop Store Uganda</title>
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
            <h2>Create Account</h2>
            <p>Register to receive updates on laptops and promotions.</p>

            <?php if ($message): ?>
                <div class="flash flash-<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <form action="register_process.php" method="POST" novalidate>
                <label for="full_name">Full Name</label>
                <input id="full_name" name="full_name" type="text" placeholder="Full Name" required>

                <label for="email">Email Address</label>
                <input id="email" name="email" type="email" placeholder="Email Address" required>

                <label for="password">Create Password</label>
                <input id="password" name="password" type="password" placeholder="Create Password" required>

                <button type="submit">Register</button>
            </form>

            <p class="form-link">
                Already have an account?
                <a href="login.php">Login</a>
            </p>
        </div>
    </main>
</body>
</html>
