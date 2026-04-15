<?php

// PDO databázové pripojenie
$host = "localhost";
$dbname = "formular";
$port = 3306;
$username = "root";
$password = "";

// Možnosti
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
);

// Pripojenie PDO
try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;port=$port",
        $username,
        $password,
        $options
    );
} catch (PDOException $e) {
    die("Chyba pripojenia: " . $e->getMessage());


// Získanie údajov z formulára
    $meno = $_POST["meno"] ;
    $email = $_POST["email"] ;
    $sprava = $_POST["sprava"] ;

// SQL príkaz INSERT (bezpečný - prepared statement)
    $sql = "INSERT INTO udaje (meno, email, sprava) 
        VALUES ('" .$meno ."','".$email."', '".$sprava."')";

    $statement = $conn->prepare($sql);

    try {
        $insert = $statement->execute();

        header("Location: http://localhost/sablona/thankyou.php");
        return $insert;


    } catch (Exception $exception) {
        return false;
    }

// Zatvorenie pripojenia
    $conn = null;
}


require_once '../classes/Kontakt.php';

use formular\Kontakt;

// Získanie údajov z formulára (s fallbackom)
$meno = $_POST['meno'] ;
$email = $_POST['email'] ;
$sprava = $_POST['sprava'] ;

// Overenie údajov
if (empty($meno) || empty($email) || empty($sprava)) {
    http_response_code(400);
    die('Chyba: Všetky polia sú povinné!');
}

// (Voliteľné) validácia emailu
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    die('Chyba: Neplatný email!');
}

// Uloženie správy do databázy
$kontakt = new Kontakt();
$ulozene = $kontakt->ulozitSpravu($meno, $email, $sprava);

if ($ulozene) {
    header('Location: ../thankyou.php');
    exit;
} else {
    http_response_code(500);
    die('Chyba pri odosielaní správy do databázy!');
}