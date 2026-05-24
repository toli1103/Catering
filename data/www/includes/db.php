<?php

require_once __DIR__ . '/config.php';

$dbStatus = 'Povezava na bazo ni uspela.';
$pdo = null;

try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $dbStatus = 'Povezava na bazo uspešna.';
} catch (PDOException $e) {
    $dbStatus = 'Povezava ni uspela: ' . $e->getMessage();
}
