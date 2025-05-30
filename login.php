<?php
$loginIncorrect = false;
session_start();

if(isset($_POST['Login'])) {
    $servername = "mysql_db";
    $username = "root";
    $password = "rootpassword";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

// voeren query uit
    $sql = "SELECT * FROM `gebruikers` WHERE `password` = :password AND username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->execute();
    $gebruiker = $stmt->fetch();

    if($gebruiker) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
    } else {
        $loginIncorrect = true;
    }

}





?>



<!DOCTYPE html>
        <html lang="nl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login | Pizzeria Nijmegen</title>
            <link rel="stylesheet" href="css/style.css">
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

        <section class="login-container">
            <h2>Login</h2>

            <form method="post" action="">
                <div class="form-group">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" id="username" name="username" placeholder="Voer je gebruikersnaam in" required>
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" id="password" name="password" placeholder="Voer je wachtwoord in" required>
                </div>

                <button type="submit" class="btn-submit" name="Login">Inloggen</button>

                <?php
                if ($loginIncorrect) {
                    echo '<div class="error">Onjuiste gebruikersnaam of wachtwoord</div>';
                }
                ?>
            </form>
        </section>

        </body>
        </html>
