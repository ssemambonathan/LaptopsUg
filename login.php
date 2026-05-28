<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
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

<div class="form-container">

    <h2>Login</h2>

    <p>
        Login to access your account and track purchases.
    </p>

    <form>

        <input type="email"
               placeholder="Email Address"
               required>

        <input type="password"
               placeholder="Password"
               required>

        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>
</html>