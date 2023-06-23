<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Session.php';
try {
    $session = SessionControl::loginSession();
} catch (Exception $excaption) {
    header('Location: /login.php');
    exit(0);
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
    HALLO <?= $session->name; ?>

    <a href="/logout.php">EXIT</a>
</body>

</html>