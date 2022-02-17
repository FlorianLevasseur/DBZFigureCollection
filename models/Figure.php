<?php
class Figure {
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

    public function getAllCharacters() {
        $db = $this->dbConnect();
        $sql = "SELECT DISTINCT `figure`.`character` FROM `figure` ORDER BY `figure`.`character`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllYears() {
        $db = $this->dbConnect();
        $sql = "SELECT DISTINCT date_format(figure.date,'%Y') FROM figure;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCompanies() {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM company;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneCharacter(string $character) {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `figure` WHERE `figure`.`character` = '$character' ORDER BY `figure`.`full_name`;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':character', $character, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbCharacter(string $character) {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) AS nb_character FROM `figure` WHERE `figure`.`character` = :character;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':character', $character, PDO::PARAM_STR);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_character'];
    }

    public function getLimitListCharacter(string $character, int $premier, int $parpage) {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM `figure` WHERE `figure`.`character` = :character LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':character', $character, PDO::PARAM_STR);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFigureDetails(int $id) {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, company.company, GROUP_CONCAT(serie.serie SEPARATOR ', ') as serie FROM `figure` 
        INNER JOIN company ON company.id = figure.id_company
        INNER JOIN figure_serie ON figure_serie.id_figure = figure.id
        INNER JOIN serie ON serie.id = figure_serie.id
        WHERE `figure`.`id` = $id;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function getFigureDetailsForModif(int $id) {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company, GROUP_CONCAT(figure_serie.id SEPARATOR ',') as serie FROM `figure` 
        INNER JOIN figure_serie ON figure_serie.id_figure = figure.id
        WHERE `figure`.`id` = $id;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllFigures() {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `figure`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbAllFigures() {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) as nb_figures FROM `figure`;";
        $resultQuery = $db->query($sql);
        $result = $resultQuery->fetch();
        return (int) $result['nb_figures'];
    }

    public function getLimitListFigures(int $premier, int $parpage) {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM `figure` LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMyFigures(int $id) {
        $db = $this->dbConnect();
        $sql = "SELECT `figure`.`full_name`, `owned`.`id` FROM `owned`
        INNER JOIN `figure` ON `figure`.`id` = `owned`.`id`
        WHERE `id_user` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbMyFigures(int $id) {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) as nb_owned FROM `owned`
        WHERE `id_user` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_owned'];
    }

    public function getLimitListMyFigures(int $id, int $premier, int $parpage) {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM `owned` 
        INNER JOIN `figure` on `figure`.`id` = `owned`.`id`
        WHERE `id_user` = :id LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMyWishes(int $id) {
        $db = $this->dbConnect();
        $sql = "SELECT `figure`.`full_name`, `wanted`.`id` FROM `wanted`
        INNER JOIN `figure` ON `figure`.`id` = `wanted`.`id`
        WHERE `id_user` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbMyWishes(int $id) {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) as nb_wanted FROM `wanted`
        WHERE `id_user` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_wanted'];
    }

    public function getLimitListMyWishes(int $id, int $premier, int $parpage) {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM `wanted` 
        INNER JOIN `figure` on `figure`.`id` = `wanted`.`id`
        WHERE `id_user` = :id LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCollecFigure(int $id_figure, int $id_user) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO owned VALUES(:id_figure, :id_user)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function addWishFigure(int $id_figure, int $id_user) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO wanted VALUES(:id_figure, :id_user)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function removeCollecFigure(int $id_figure, int $id_user) {
        $db = $this->dbConnect();
        $sql = "DELETE FROM owned WHERE id = :id_figure AND id_user = :id_user";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function removeWishFigure(int $id_figure, int $id_user) {
        $db = $this->dbConnect();
        $sql = "DELETE FROM wanted WHERE id = :id_figure AND id_user = :id_user";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function getOwnedBy(int $id_figure) {
        $db = $this->dbConnect();
        $sql = "SELECT `owned`.`id_user`, `user`.`pseudo` FROM `owned` INNER JOIN `user` ON `user`.`id` = `owned`.`id_user` WHERE `owned`.`id` = :id_figure";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWantedBy(int $id_figure) {
        $db = $this->dbConnect();
        $sql = "SELECT `wanted`.`id_user`, `user`.`pseudo` FROM `wanted` INNER JOIN `user` ON `user`.`id` = `wanted`.`id_user` WHERE `wanted`.`id` = :id_figure";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFigure(int $id, string $full_name, string $origin, string $character, string $form, int $height, string $date, int $id_company) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO figure VALUES(:id,:full_name,:origin,:character,:form,:height,:date,:id_company)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":full_name",$full_name,PDO::PARAM_STR);
        $resultQuery->bindValue(":origin",$origin,PDO::PARAM_STR);
        $resultQuery->bindValue(":character",$character,PDO::PARAM_STR);
        $resultQuery->bindValue(":form",$form,PDO::PARAM_STR);
        $resultQuery->bindValue(":height",$height,PDO::PARAM_INT);
        $resultQuery->bindValue(":date",$date,PDO::PARAM_STR);
        $resultQuery->bindValue(":id_company",$id_company,PDO::PARAM_INT);
        $resultQuery->bindValue(":id",$id,PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function modifFigure(int $id, string $full_name, string $origin, string $character, string $form, int $height, string $date, int $id_company) {
        $db = $this->dbConnect();
        $sql = "UPDATE `figure` SET `full_name` = :full_name, `origin` = :origin, `character` = :character, `form` = :form, `height` = :height, `date` = :date, `id_company` = :id_company
        WHERE `id` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":full_name",$full_name,PDO::PARAM_STR);
        $resultQuery->bindValue(":origin",$origin,PDO::PARAM_STR);
        $resultQuery->bindValue(":character",$character,PDO::PARAM_STR);
        $resultQuery->bindValue(":form",$form,PDO::PARAM_STR);
        $resultQuery->bindValue(":height",$height,PDO::PARAM_INT);
        $resultQuery->bindValue(":date",$date,PDO::PARAM_STR);
        $resultQuery->bindValue(":id_company",$id_company,PDO::PARAM_INT);
        $resultQuery->bindValue(":id",$id,PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function deleteFigure(int $id) {
        $db = $this->dbConnect();
        $sql = "DELETE FROM figure WHERE id = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }
}