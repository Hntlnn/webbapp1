<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$servername = "mysql_db";
$username = "root";
$password = "rootpassword";

try {
    $conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);
} catch(PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
}

// Haal alle menu-items op
$stmt = $conn->prepare("SELECT * FROM menu");
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="admin-header">
    <h1>Welkom bij het Admin Panel</h1>
    <p>Beheer hier het restaurantmenu.</p>
</div>

<div class="button-group">
    <a href="add.php"><button class="add-item-btn">Voeg Nieuw Item Toe</button></a>
    <a href="logout.php"><button class="logout-btn">Uitloggen</button></a>
</div>

<div class="menu-section">
    <h2 class="menu-title">Menu Items</h2>
</div>
</body>
</html>

<?php
// Toon de menu-items
while ($row = $stmt->fetch()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<p>€" . number_format($row['prijs'], 2, ',', '.') . "</p>";
    echo "<a href='bewerken.php?id=" . $row['id'] . "'><button>Bewerken</button></a> ";
    echo "<a href='delete.php?id=" . $row['id'] . "'><button>Verwijderen</button></a>";
    echo "</div><hr>";
}
?>

</body>
</html>
