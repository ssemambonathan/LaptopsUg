<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
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

    <h2>Create Account</h2>

    <p>
        Register to receive updates on laptops and promotions.
    </p>

    <form>

        <input type="text"
               placeholder="Full Name"
               required>

        <input type="email"
               placeholder="Email Address"
               required>

        <input type="password"
               placeholder="Create Password"
               required>

        <button type="submit">
            Register
        </button>

    </form>

</div>

</body>
</html>