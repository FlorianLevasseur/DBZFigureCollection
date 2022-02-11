<?php
class Personal_Picture {
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

    public function uploadImg(string $picture, int $id_user, int $id_figure, int $visible) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO `personal_picture`(`picture`, `id_user`, `id_figure`, `visible`) VALUES (:picture, :id_user, :id_figure, :visible);";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":picture", $picture, PDO::PARAM_STR);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":visible", $visible, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function getUserImg(string $picture){
        $db = $this->dbConnect();
        $sql = "SELECT `user`.`pseudo`, `personal_picture`.`visible` FROM `user`
        INNER JOIN `personal_picture` ON `personal_picture`.`id_user` = `user`.`id`
        WHERE `personal_picture`.`picture` = :picture";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":picture", $picture, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPicturesDetails(){
        $db = $this->dbConnect();
        $sql = "SELECT id, picture,
        CASE
            WHEN visible = 0 THEN 'Non'
            ELSE 'Oui'
        END AS visible
        FROM `personal_picture`";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPictures(){
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `personal_picture`";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPicture(int $id){
        $db = $this->dbConnect();
        $sql = "SELECT `personal_picture`.`picture`, `user`.`pseudo`, `figure`.`full_name`, `personal_picture`.`visible` FROM `personal_picture`
        INNER JOIN `user` ON `user`.`id` = `personal_picture`.`id_user`
        INNER JOIN `figure` ON `figure`.`id` = `personal_picture`.`id_figure`
        WHERE `personal_picture`.`id` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function modifPicture(int $id, int $visible) {
        $db = $this->dbConnect();
        $sql = "UPDATE `personal_picture` SET `visible` = :visible WHERE `id` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->bindValue(":visible", $visible, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function deletePicture(int $id){
        $db = $this->dbConnect();
        $sql = "DELETE FROM `personal_picture` WHERE `id` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }
}