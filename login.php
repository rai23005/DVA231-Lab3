<?php
session_start();

// Kontrollera om användaren redan har en giltig cookie
if (isset($_COOKIE['rememberme_token'])) {
    $_SESSION['loggedin'] = true;
    header('Location: admin.php');
    exit;
}

// Kontrollera om formuläret har skickats
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Enkel kontroll av användarnamn och lösenord
    if ($username === 'admin' && $password === 'password123') {
        $_SESSION['loggedin'] = true;

        // Spara en cookie för "Remember Me"-funktion
        if (isset($_POST['rememberme'])) {
            $rememberToken = bin2hex(random_bytes(16)); // Generera en säker token
            setcookie('rememberme_token', $rememberToken, time() + (86400 * 30), "/"); // Giltig i 30 dagar

            // Spara token i sessionen (eller databasen om du använder det)
            $_SESSION['rememberme_token'] = $rememberToken;
        }

        header('Location: admin.php');
        exit;
    } else {
        $error = "Felaktigt användarnamn eller lösenord!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logga in</title>
</head>
<body>
    <h1>Logga in</h1>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <label for="username">Användarnamn:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Lösenord:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label>
            <input type="checkbox" name="rememberme"> Håll mig inloggad
        </label>
        <br>
        <button type="submit">Logga in</button>
    </form>
</body>
</html>
