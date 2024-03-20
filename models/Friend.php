<?php


require_once 'config/config.php';

class FriendModel {


    private $pdo;

    public function __construct() {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
            // echo "Connection Is Success";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function createFriend($name, $age) {
        $stmt = $this->pdo->prepare("INSERT INTO friends (name, age) VALUES (?, ?)");
        $stmt->execute([$name, $age]);
        return true;
    }

    public function getAllFriend(){
        $stmt = $this->pdo->prepare("SELECT * FROM friends");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getIDFriend($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM friends WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateFriend($id, $name, $age) {
        $stmt = $this->pdo->prepare("UPDATE friends SET name = ?, age = ? WHERE id= ?");
        $stmt->execute([$id, $name, $age]);
        return true;
    }

    public function deleteFriend($id) {
        $stmt = $this->pdo->prepare("DELETE FROM friends WHERE id = ?");
        $stmt->execute([$id]);
        return true;
    }

}