<?php
require_once __DIR__ . '/vendor/autoload.php';

setcookie('TEST-GET_JWT', 'exit0');

header('Location: /login.php');
