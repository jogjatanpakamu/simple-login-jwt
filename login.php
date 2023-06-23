<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Session.php';

$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (SessionControl::login($_POST['username'], $_POST['password'])) {
        header('Location: /index.php');
        exit(0);
    } else {
        $message = 'Gagal Login';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="login.php" method="post">
        <input type="text" name="username">
        <input type="text" name="password">

        <button type="submit">KIRIM</button>
    </form>

</body>

</html>