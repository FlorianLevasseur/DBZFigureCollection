<?php
class User extends Database {

    public function getAllUsers() {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `user`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbAllUsers() {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) as nb_users FROM `user`;";
        $resultQuery = $db->query($sql);
        $result = $resultQuery->fetch();
        return (int) $result['nb_users'];
    }

    public function getLimitListUsers(int $premier, int $parpage) {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM `user` ORDER BY `pseudo` LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUsersDetails() {
        $db = $this->dbConnect();
        $sql = "SELECT `id`, `pseudo`, `password`, `mail`, 
        CASE
            WHEN `admin` = 0 THEN 'Non'
            ELSE 'Oui'
        END as `admin`,
        CASE
            WHEN `accepted` = 0 THEN 'Non'
            ELSE 'Oui'
        END as `accepted`
        FROM `user`
        ORDER BY `pseudo`";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser(int $id) {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM user WHERE id = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch();
    }

    public function addUser(string $pseudo, string $password, string $mail, int $admin, int $accepted) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO `user`(`pseudo`, `password`, `mail`, `admin`, `accepted`) VALUES (:pseudo, :password, :mail, :admin, :accepted);";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $resultQuery->bindValue(":password", $password, PDO::PARAM_STR);
        $resultQuery->bindValue(":mail", $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(":admin", $admin, PDO::PARAM_INT);
        $resultQuery->bindValue(":accepted", $accepted, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function modifUser(int $id, string $pseudo, string $mail, int $admin, int $accepted) {
        $db = $this->dbConnect();
        $sql = "UPDATE `user` SET `pseudo` = :pseudo, `mail` = :mail, `admin` = :admin, `accepted` = :accepted WHERE `id` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $resultQuery->bindValue(":mail", $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(":admin", $admin, PDO::PARAM_INT);
        $resultQuery->bindValue(":accepted", $accepted, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function deleteUser(int $id) {
        $db = $this->dbConnect();
        $sql = "DELETE FROM `user` WHERE `id` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function setPassword(string $mail, string $password){
        $db = $this->dbConnect();
        $sql = "UPDATE `user` SET password = :password
        WHERE `mail` = :mail";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":mail", $mail, PDO::PARAM_STR);
        $resultQuery->bindValue(":password", $password, PDO::PARAM_STR);
        $resultQuery->execute();
    }
}