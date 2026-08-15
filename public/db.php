<?php
// db.php
$host = "aws-0-eu-central-1.pooler.supabase.com";
$port = "6543";
$db   = "postgres";
$user = "postgres.ofmnsxgbhzddsbjovyhe";
$pass = "Nyarwaik254";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
