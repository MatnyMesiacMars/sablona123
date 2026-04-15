<?php

namespace formular;

require_once '../db/spracovanieFormulara.php';

use PDO;
use PDOException;

class Kontakt
{
    private PDO $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        $config = DATABASE;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $dsn = "mysql:host={$config['HOST']};dbname={$config['DBNAME']};port={$config['PORT']}";

            $this->conn = new PDO(
                $dsn,
                $config['USER_NAME'],
                $config['PASSWORD'],
                $options
            );

        } catch (PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }
}
public function ulozitSpravu(string $meno, string $email, string $sprava): bool
{
    $sql = "INSERT INTO kontakt_formular (meno, email, sprava) 
            VALUES (:meno, :email, :sprava)";

    $statement = $this->conn->prepare($sql);

    try {
        $insert = $statement->execute([
            ':meno' => $meno,
            ':email' => $email,
            ':sprava' => $sprava,
        ]);

        header("Location: http://localhost/cvicnasablona/thankyou.php");
        http_response_code(200);
        exit;

    } catch (\Exception $exception) {
        http_response_code(500);
        return false;
    }
}

public function __destruct()
{
    $this->conn = null;
}