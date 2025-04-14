<?php
        session_start();
        $servername = "mysql_db";
        $username = "root";
        $password = "rootpassword";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);
            // Zet de PDO foutmodus op uitzondering
        } catch(PDOException $e) {
            echo "Verbinding mislukt: " . $e->getMessage();
        }

        $sql = "SELECT * FROM `gebruikers` WHERE `password` = :password AND username = :username";
        $statement = $conn->prepare($sql);
        $statement->bindParam(':password', $_POST['password']);
        $statement->bindParam(':username', $_POST['name']);  // Correcte parameternaam
        $statement->execute();
        $gebruiker = $statement->fetch();


        //check
        $loginIncorrect = false;
        if (isset($_POST['Login'])) {

            if ($_POST['username'] == "admin" && $_POST['password'] == "geheim") {
                $_SESSION['admin'] = true;
                header("Location: admin.php");
                exit();
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
