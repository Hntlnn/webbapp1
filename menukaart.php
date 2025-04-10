
<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";

try {
    $conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);
    // Zet de PDO foutmodus op uitzondering
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}

$stmt = $conn->prepare('SELECT * FROM `menu` WHERE title LIKE "%' . $_POST['zoekveld'] . '%"' );
$stmt->execute();
?>



<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pizzeria Nijmegen</title>
</head>
<body>

<header>
    <h1>Pizzeria Nijmegen</h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menukaart.php">Menu</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>

<section>
    <div class="center-content2">
        <h2>Menu</h2>

        <form action="menukaart.php" method="POST">
            <input type="text" name="zoekveld" placeholder="Zoek een gerecht...">
        </form>
    </div>

    <div class="menu-container">

        <?php
        while ($result = $stmt->fetch()) {
            ?>
            <div class="menu-item">
                <h3><?php echo $result['title']; ?></h3>
                <p class="price">€<?php echo number_format($result['prijs'], 2, ',', '.'); ?></p>

            </div>
            <?php
        }
        ?>
    </div>
</section>

<footer>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menukaart.php">Menu</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</footer>

</body>
</html>
