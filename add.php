<?php
$sql = "INSERT INTO menu (title, prijs, omschrijving) VALUES (:title, :prijs, :omschrijving)";

$servername = "mysql_db";
$username = "root";
$password = "rootpassword";

try {
    $conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);
    // set the PDO error mode to exception
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (!empty($_POST['title']) && !empty($_POST['prijs']) && !empty($_POST['omschrijving'])) {

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":title", $_POST['title']);
    $stmt->bindParam(":prijs", $_POST['prijs']);
    $stmt->bindParam(":omschrijving", $_POST['omschrijving']);

    $stmt->execute();

    echo 'Toegevoegd';
} else

?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voeg Nieuw Menu Item Toe</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menukaart.php">Menu</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
</header>

<main>
    <h1>Voeg Nieuw Menu Item Toe</h1>
    <form method="POST" action="add.php">
        <input type="text" name="title" placeholder="Titel" required>
        <input type="text" name="prijs" placeholder="Prijs" required>
        <textarea name="omschrijving" placeholder="Omschrijving" required></textarea>
        <button type="submit">Toevoegen</button>
    </form>

    <!-- Link naar de admin pagina -->
    <a href="admin.php">Terug naar Admin</a>




</main>
</body>
</html>
