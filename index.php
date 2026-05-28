<?php
$xml = simplexml_load_file("laptops.xml");

if(!$xml){
    die("Unable to load laptop data.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laptop Store Uganda</title>
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

<header>
    <h1>Laptop Store Uganda</h1>
    <p>Quality Laptops at Affordable Prices</p>
</header>

<section class="welcome">
    <h2>Welcome to Laptop Store Uganda</h2>

    <p>
        We provide quality laptops for students,
        professionals, businesses and gamers.
        Browse our collection below.
    </p>
</section>

<div class="container">

    <div class="products">

        <?php foreach($xml->laptop as $laptop): ?>

        <div class="card">

            <img
                src="<?php echo htmlspecialchars($laptop->image); ?>"
                alt="<?php echo htmlspecialchars($laptop->brand . ' ' . $laptop->model); ?>"
            >

            <div class="card-content">

                <h3>
                    <?php echo htmlspecialchars($laptop->brand); ?>
                    <?php echo htmlspecialchars($laptop->model); ?>
                </h3>

                <p>
                    <strong>RAM:</strong>
                    <?php echo htmlspecialchars($laptop->ram); ?>
                </p>

                <p>
                    <strong>Storage:</strong>
                    <?php echo htmlspecialchars($laptop->storage); ?>
                </p>

                <p class="price">
                    UGX <?php echo number_format((int)$laptop->price); ?>
                </p>

                <button>Buy Now</button>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Laptop Store Uganda</p>
</footer>

</body>
</html>