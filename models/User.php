<?php
class User {
    private string $_dbname = 'dbz';
    private string $_user = 'dbz';
    private string $_password = 'dbz';

    private function dbConnect() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->_dbname;charset=utf8", $this->_user, $this->_password);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur : $e->getMessage()");
        }
    }

    public function getAllUsers() {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `user`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser(string $pseudo, string $password, string $mail, int $admin) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO `user`(`pseudo`, `password`, `mail`, `admin`) VALUES (:pseudo, :password, :mail, :admin);";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $resultQuery->bindValue(":password", $password, PDO::PARAM_STR);
        $resultQuery->bindValue(":mail", $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(":admin", $admin, PDO::PARAM_STR);
        $resultQuery->execute();
    }
}