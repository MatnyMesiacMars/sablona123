<?php

$host = "localhost";
$dbname = "formular";
$port = 3306;
$username = "root";
$password = "";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;port=$port",
        $username,
        $password,
        $options
    );
} catch (PDOException $e) {
    die("Chyba pripojenia: " . $e->getMessage());
}

// Data from form
$meno = $_POST["meno"];
$email = $_POST["email"];
$sprava = $_POST["sprava"];

// Validation
if (empty($meno) || empty($email) || empty($sprava)) {
    die("Všetky polia sú povinné!");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Neplatný email!");
}

// Insert
$sql = "INSERT INTO udaje (meno, email, sprava) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$meno, $email, $sprava]);

// Redirect
header("Location: http://localhost/sablona/thankyou.php");
exit;