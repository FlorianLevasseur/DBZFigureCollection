<?php
class Serie {
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

    public function getAllSeries() {
        $db = $this->dbConnect();
        $sql = "SELECT `serie`.`serie` FROM `serie` ORDER BY `serie`.`serie`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }
}