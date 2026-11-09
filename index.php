<?php
require __DIR__ . '/auth.php';

session_start();

function resolveLaptopPath(): string
{
    $candidates = ['Laptops.xml', 'laptops.xml'];

    foreach ($candidates as $candidate) {
        if (file_exists(__DIR__ . '/' . $candidate)) {
            return $candidate;
        }
    }

    return 'Laptops.xml';
}

$xmlPath = resolveLaptopPath();
$xml = simplexml_load_file(__DIR__ . '/' . $xmlPath);

if (!$xml) {
    die('Unable to load laptop data.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptop Store Uganda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Laptop Store</div>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <header class="hero">
        <div class="hero-inner">
            <p class="eyebrow">Trusted electronics</p>
            <h1>Laptop Store Uganda</h1>
            <p>Quality laptops for work, study, and business at affordable prices.</p>
        </div>
    </header>

    <section class="welcome">
        <h2>Welcome to Laptop Store Uganda</h2>
        <p>
            We provide quality laptops for students, professionals, businesses, and gamers.
            Browse our collection below and discover reliable performance at a fair price.
        </p>
    </section>

    <main class="container">
        <div class="products">
            <?php foreach ($xml->laptop as $laptop): ?>
                <article class="card">
                    <img
                        src="<?php echo htmlspecialchars((string)$laptop->image); ?>"
                        alt="<?php echo htmlspecialchars((string)$laptop->brand . ' ' . (string)$laptop->model); ?>"
                    >

                    <div class="card-content">
                        <h3>
                            <?php echo htmlspecialchars((string)$laptop->brand); ?>
                            <?php echo htmlspecialchars((string)$laptop->model); ?>
                        </h3>

                        <p><strong>RAM:</strong> <?php echo htmlspecialchars((string)$laptop->ram); ?></p>
                        <p><strong>Storage:</strong> <?php echo htmlspecialchars((string)$laptop->storage); ?></p>
                        <p class="price">UGX <?php echo number_format((int)$laptop->price); ?></p>

                        <button type="button">Buy Now</button>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Laptop Store Uganda</p>
    </footer>
</body>
</html>
