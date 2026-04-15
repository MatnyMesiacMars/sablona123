<?php

class QnA {
    private PDO $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect(): void {
        $this->conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getQnA(): array {
        $stmt = $this->conn->query("SELECT otazka, odpoved FROM qna");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}