<?php
if (isset($_POST['verwijder'])) {
    $id = $_GET['id'];

    $servername = "mysql_db";
    $username = "root";
    $password = "rootpassword";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);
        echo "Verbinding succesvol<br>";
    } catch(PDOException $e) {
        echo "Verbinding mislukt: " . $e->getMessage();
    }


    $sql = "DELETE FROM menu WHERE id = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Gerecht verwijderd met ID: " . $id;
    } else {
        echo "Er is een fout opgetreden bij het verwijderen.";
    }
}

?>


<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verwijder Gerecht</title>
</head>
<body>

<h1>Verwijder gerecht?</h1>

<form action="delete.php?id=<?php echo $_GET['id']; ?>" method="post">
    <input type="submit" name="verwijder" value="Ja, verwijder">
</form>

<form action="menukaart.php" method="get">
    <input type="submit" value="Annuleer" />
</form>

<form action="admin.php" method="get">
    <input type="submit" value="Ga naar Admin" />
</form>

</body>
</html>
