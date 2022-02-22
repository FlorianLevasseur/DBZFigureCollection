<?php
class Database{
    private string $_dbname = DBNAME;
    private string $_user = DBUSER;
    private string $_password = DBPASSWORD;

    protected function dbConnect() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->_dbname;charset=utf8", $this->_user, $this->_password);
            return $pdo;
        } catch (PDOException $e) {
            die("Erreur : $e->getMessage()");
        }
    }
}