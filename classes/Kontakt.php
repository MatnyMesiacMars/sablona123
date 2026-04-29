<?php

namespace formular;

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
        // Load configuration safely
        $config = require __DIR__ . '/../config.php';

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

    /**
     * Uloží správu z kontaktného formulára do databázy
     */
    public function ulozitSpravu(string $meno, string $email, string $sprava): bool
    {
        $sql = "INSERT INTO kontakt_formular (meno, email, sprava) 
                VALUES (:meno, :email, :sprava)";

        try {
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute([
                ':meno' => $meno,
                ':email' => $email,
                ':sprava' => $sprava,
            ]);

        } catch (PDOException $e) {
            error_log("DB error: " . $e->getMessage());
            return false;
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}