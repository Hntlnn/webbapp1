
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

<section class="contact">
    <h2>Neem contact met ons op</h2>
    <form action="submit_contact.php" method="POST">
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" id="name" name="name" placeholder="Je naam" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Je e-mail" required>
        </div>

        <div class="form-group">
            <label for="message">Bericht</label>
            <textarea id="message" name="message" rows="4" placeholder="Schrijf hier je bericht" required></textarea>
        </div>

        <button type="submit" class="btn-submit">Verzenden</button>
    </form>
</section>

</body>
</html>

