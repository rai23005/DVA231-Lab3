<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php"); // Gå till login om ej inloggad
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['news_file'])) {
    $targetFilePath = 'news.json';
    if (move_uploaded_file($_FILES['news_file']['tmp_name'], $targetFilePath)) {

        // Spara filens innehåll i en session för att spåra att en ny fil har laddats upp
        $_SESSION['uploaded_json'] = file_get_contents($targetFilePath); 

        header("Location: index.php"); // Tillbaka till huvudsidan
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1>Upload News JSON</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="news_file" accept=".json" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
