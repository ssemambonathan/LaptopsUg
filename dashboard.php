<?php
require __DIR__ . '/auth.php';

session_start();

if (!isset($_SESSION['user'])) {
    redirect('login.php');
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
    <title>Dashboard | Laptop Store Uganda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Laptop Store</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <main class="dashboard-shell">
        <section class="dashboard-header">
            <div>
                <p class="eyebrow">Welcome back</p>
                <h1><?php echo htmlspecialchars($_SESSION['user']['name']); ?></h1>
            </div>
            <a class="button-secondary" href="logout.php">Logout</a>
        </section>

        <section class="stats-grid">
            <div class="stat-card">
                <span class="stat-label">Account</span>
                <strong><?php echo htmlspecialchars($_SESSION['user']['email']); ?></strong>
            </div>
            <div class="stat-card">
                <span class="stat-label">Available products</span>
                <strong><?php echo count($xml->laptop); ?></strong>
            </div>
        </section>

        <section class="dashboard-panel">
            <h2>Recommended products</h2>
            <div class="products compact">
                <?php foreach ($xml->laptop as $laptop): ?>
                    <article class="card">
                        <img
                            src="<?php echo htmlspecialchars((string)$laptop->image); ?>"
                            alt="<?php echo htmlspecialchars((string)$laptop->brand . ' ' . (string)$laptop->model); ?>"
                        >
                        <div class="card-content">
                            <h3><?php echo htmlspecialchars((string)$laptop->brand . ' ' . (string)$laptop->model); ?></h3>
                            <p class="price">UGX <?php echo number_format((int)$laptop->price); ?></p>
                            <button type="button">Add to cart</button>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>
