<?php
class Figure extends Database
{

    /**
     * Permet d'ajouter une figurine à la base de données
     * 
     * @param int $id ex. 719
     * @param string $full_name ex. Dragon Ball Z - Freezer - Master Stars Piece
     * @param string $origin ex. Dragon Ball Z
     * @param string $character ex. Freezer
     * @param string $form ex. Final Form
     * @param int $height ex. 19
     * @param string $date ex. 2015-12-08
     * @param int $id_company ex. 1
     */
    public function addFigure(int $id, string $full_name, string $origin, string $character, string $form, int $height, string $date, int $id_company): void
    {
        $db = $this->dbConnect();
        $sql = "INSERT INTO figure VALUES(:id,:full_name,:origin,:character,:form,:height,:date,:id_company)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":full_name", $full_name, PDO::PARAM_STR);
        $resultQuery->bindValue(":origin", $origin, PDO::PARAM_STR);
        $resultQuery->bindValue(":character", $character, PDO::PARAM_STR);
        $resultQuery->bindValue(":form", $form, PDO::PARAM_STR);
        $resultQuery->bindValue(":height", $height, PDO::PARAM_INT);
        $resultQuery->bindValue(":date", $date, PDO::PARAM_STR);
        $resultQuery->bindValue(":id_company", $id_company, PDO::PARAM_INT);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    /**
     * Permet de recuperer tous les noms de personnage dans un tableau associatif 
     * 
     * @return array : tableau associatif
     */
    public function getAllCharacters(): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT DISTINCT `figure`.`character` FROM `figure` ORDER BY `figure`.`character`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de recuperer toutes les années de sortie des figurines dans un tableau associatif 
     * 
     * @return array : tableau associatif
     */
    public function getAllYears(): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT DISTINCT date_format(figure.date,'%Y') as `year` FROM figure;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de recuperer tous les éditeurs de figurines dans un tableau associatif 
     * 
     * @return array : tableau associatif
     */
    public function getAllCompanies(): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM company;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer toutes les figurines correspondant à un personnage
     * 
     * @param string $character: ex. Son Goku
     * 
     * @return array : tableau associatif
     */
    public function getOneCharacter(string $character): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `figure` WHERE `figure`.`character` = :character ORDER BY `figure`.`full_name`;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':character', $character, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer le nombre de figurines correspondant à un personnage
     * 
     * @param string $character: ex. Son Goku
     * 
     * @return int
     */
    public function getNbCharacter(string $character): int
    {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) AS nb_character FROM `figure` WHERE `figure`.`character` = :character;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':character', $character, PDO::PARAM_STR);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_character'];
    }

    /**
     * Permet de récupérer une liste limitée des figurines correspondant à un personnage
     * 
     * @param string $character: ex. Son Goku
     * @param int $premier: ex. 0
     * @param int $parpage: ex. 6
     * @param int $ordre: ex. 1
     * 
     * @return array : tableau associatif
     */
    public function getLimitListCharacter(string $character, int $premier, int $parpage, int $order): array
    {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM `figure` WHERE `figure`.`character` = :character ORDER BY :order LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':character', $character, PDO::PARAM_STR);
        $resultQuery->bindValue(':order', $order, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer toutes les figurines correspondant à une série
     * 
     * @param string $serie: ex. BWFC
     * 
     * @return array : tableau associatif
     */
    public function getOneSerieCharacters(string $serie): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `figure`
        INNER JOIN figure_serie ON figure_serie.id_figure = figure.id
        INNER JOIN serie ON serie.id = figure_serie.id
        WHERE `serie`.`serie` = :serie ORDER BY `figure`.`full_name`;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':serie', $serie, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer le nombre de figurines correspondant à une série
     * 
     * @param string $serie: ex. BWFC
     * 
     * @return int
     */
    public function getSerieNbCharacters(string $serie): int
    {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) AS nb_character FROM `figure`
        INNER JOIN figure_serie ON figure_serie.id_figure = figure.id
        INNER JOIN serie ON serie.id = figure_serie.id
        WHERE `serie`.`serie` = :serie;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':serie', $serie, PDO::PARAM_STR);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_character'];
    }

    /**
     * Permet de récupérer une liste limitée des figurines correspondant à une série
     * 
     * @param string $serie: ex. BWFC
     * @param int $premier: ex. 0
     * @param int $parpage: ex. 6
     * @param int $ordre: ex. 1
     * 
     * @return array : tableau associatif
     */
    public function getLimitListSerieCharacters(string $serie, int $premier, int $parpage, int $order): array
    {
        $db = $this->dbConnect();
        $sql = 'SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `figure` 
        INNER JOIN figure_serie ON figure_serie.id_figure = figure.id
        INNER JOIN serie ON serie.id = figure_serie.id        
        WHERE `serie`.`serie` = :serie
        ORDER BY :order
        LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':serie', $serie, PDO::PARAM_STR);
        $resultQuery->bindValue(':order', $order, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer toutes les figurines correspondant à une année
     * 
     * @param string $year: ex. 2021
     * 
     * @return array : tableau associatif
     */
    public function getOneYearCharacters(string $year): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `figure` WHERE date_format(figure.date,'%Y') = :year ORDER BY `figure`.`full_name`;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':year', $year, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer le nombre de figurines correspondant à une année
     * 
     * @param string $year: ex. 2021
     * 
     * @return int
     */
    public function getYearNbCharacters(string $year): int
    {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) AS nb_character FROM `figure` WHERE date_format(figure.date,'%Y') = :year;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':year', $year, PDO::PARAM_STR);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_character'];
    }

    /**
     * Permet de récupérer une liste limitée des figurines correspondant à une année
     * 
     * @param string $year: ex. 2021
     * @param int $premier: ex. 0
     * @param int $parpage: ex. 6
     * @param int $ordre: ex. 1
     * 
     * @return array : tableau associatif
     */
    public function getLimitListYearCharacters(string $year, int $premier, int $parpage, int $order): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `figure` WHERE date_format(figure.date,'%Y') = :year ORDER BY :order LIMIT :premier, :parpage;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':year', $year, PDO::PARAM_STR);
        $resultQuery->bindValue(':order', $order, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer toutes les figurines correspondant à un ordre de taille (entre ... et ...)
     * 
     * @param int $lowHeight: ex. 21
     * @param int $highHeight: ex. 25
     * 
     * @return array : tableau associatif
     */
    public function getOneHeightCharacters(int $lowHeight, int $highHeight)
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `figure` WHERE height BETWEEN :lowHeight AND :highHeight ORDER BY `figure`.`full_name`;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':lowHeight', $lowHeight, PDO::PARAM_INT);
        $resultQuery->bindValue(':highHeight', $highHeight, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer le nombre de figurines correspondant à un ordre de taille (entre ... et ...)
     * 
     * @param int $lowHeight: ex. 21
     * @param int $highHeight: ex. 25
     * 
     * @return int
     */
    public function getHeightNbCharacters(int $lowHeight, int $highHeight)
    {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) AS nb_character FROM `figure` WHERE height BETWEEN :lowHeight AND :highHeight;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':lowHeight', $lowHeight, PDO::PARAM_INT);
        $resultQuery->bindValue(':highHeight', $highHeight, PDO::PARAM_INT);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_character'];
    }

    /**
     * Permet de récupérer une liste limitée des figurines correspondant à un ordre de taille (entre ... et ...)
     * 
     * @param int $lowHeight: ex. 21
     * @param int $highHeight: ex. 25
     * @param int $premier: ex. 0
     * @param int $parpage: ex. 6
     * @param int $ordre: ex. 1
     * 
     * @return array : tableau associatif
     */
    public function getLimitListHeightCharacters(int $lowHeight, int $highHeight, int $premier, int $parpage, int $order)
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `figure` WHERE height BETWEEN :lowHeight AND :highHeight ORDER BY :order LIMIT :premier, :parpage;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':lowHeight', $lowHeight, PDO::PARAM_INT);
        $resultQuery->bindValue(':highHeight', $highHeight, PDO::PARAM_INT);
        $resultQuery->bindValue(':order', $order, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de récupérer les caractéristiques d'une figurine en utilisant son id
     * 
     * @param int $id: ex. 719
     * 
     * @return array : tableau associatif
     */
    public function getFigureDetails(int $id): array
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height,
        figure.date, company.company, GROUP_CONCAT(serie.serie SEPARATOR ', ') as serie FROM `figure` 
        INNER JOIN company ON company.id = figure.id_company
        INNER JOIN figure_serie ON figure_serie.id_figure = figure.id
        INNER JOIN serie ON serie.id = figure_serie.id
        WHERE `figure`.`id` = $id;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function getFigureDetailsForModif(int $id)
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company, GROUP_CONCAT(figure_serie.id SEPARATOR ',') as serie FROM `figure` 
        INNER JOIN figure_serie ON figure_serie.id_figure = figure.id
        WHERE `figure`.`id` = $id;";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllFigures()
    {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `figure`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbAllFigures()
    {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) as nb_figures FROM `figure`;";
        $resultQuery = $db->query($sql);
        $result = $resultQuery->fetch();
        return (int) $result['nb_figures'];
    }

    public function getLimitListFigures(int $premier, int $parpage, int $order)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT * FROM `figure` ORDER BY :order LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->bindValue(':order', $order, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMyFigures(int $id, int $order)
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company, `owned`.`id` FROM `owned`
        INNER JOIN `figure` ON `figure`.`id` = `owned`.`id`
        WHERE `id_user` = :id
        ORDER BY :order";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->bindValue(":order", $order, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbMyFigures(int $id)
    {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) as nb_owned FROM `owned`
        WHERE `id_user` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_owned'];
    }

    public function getLimitListMyFigures(int $id, int $premier, int $parpage, int $order)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `owned` 
        INNER JOIN `figure` on `figure`.`id` = `owned`.`id`
        WHERE `id_user` = :id
        ORDER BY :order
        LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->bindValue(':order', $order, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMyWishes(int $id, int $order)
    {
        $db = $this->dbConnect();
        $sql = "SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company, `wanted`.`id` FROM `wanted`
        INNER JOIN `figure` ON `figure`.`id` = `wanted`.`id`
        WHERE `id_user` = :id
        ORDER BY :order";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->bindValue(":order", $order, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNbMyWishes(int $id)
    {
        $db = $this->dbConnect();
        $sql = "SELECT COUNT(*) as nb_wanted FROM `wanted`
        WHERE `id_user` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return (int) $result['nb_wanted'];
    }

    public function getLimitListMyWishes(int $id, int $premier, int $parpage, int $order)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT figure.id, figure.full_name, figure.origin, figure.character, figure.form, figure.height, figure.date, figure.id_company FROM `wanted` 
        INNER JOIN `figure` on `figure`.`id` = `wanted`.`id`
        WHERE `id_user` = :id
        ORDER BY :order
        LIMIT :premier, :parpage;';
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_INT);
        $resultQuery->bindValue(':order', $order, PDO::PARAM_INT);
        $resultQuery->bindValue(':premier', $premier, PDO::PARAM_INT);
        $resultQuery->bindValue(':parpage', $parpage, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCollecFigure(int $id_figure, int $id_user)
    {
        $db = $this->dbConnect();
        $sql = "INSERT INTO owned VALUES(:id_figure, :id_user)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function addWishFigure(int $id_figure, int $id_user)
    {
        $db = $this->dbConnect();
        $sql = "INSERT INTO wanted VALUES(:id_figure, :id_user)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function removeCollecFigure(int $id_figure, int $id_user)
    {
        $db = $this->dbConnect();
        $sql = "DELETE FROM owned WHERE id = :id_figure AND id_user = :id_user";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function removeWishFigure(int $id_figure, int $id_user)
    {
        $db = $this->dbConnect();
        $sql = "DELETE FROM wanted WHERE id = :id_figure AND id_user = :id_user";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function getOwnedBy(int $id_figure)
    {
        $db = $this->dbConnect();
        $sql = "SELECT `owned`.`id_user`, `user`.`pseudo` FROM `owned` INNER JOIN `user` ON `user`.`id` = `owned`.`id_user` WHERE `owned`.`id` = :id_figure ORDER BY user.pseudo";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWantedBy(int $id_figure)
    {
        $db = $this->dbConnect();
        $sql = "SELECT `wanted`.`id_user`, `user`.`pseudo` FROM `wanted` INNER JOIN `user` ON `user`.`id` = `wanted`.`id_user` WHERE `wanted`.`id` = :id_figure ORDER BY user.pseudo";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Permet de modifier les caractéristiques d'une figurine
     * 
     * @param int $id ex. 719
     * @param string $full_name ex. Dragon Ball Z - Freezer - Master Stars Piece
     * @param string $origin ex. Dragon Ball Z
     * @param string $character ex. Freezer
     * @param string $form ex. Final Form
     * @param int $height ex. 19
     * @param string $date ex. 2015-12-08
     * @param int $id_company ex. 1
     */
    public function modifFigure(int $id, string $full_name, string $origin, string $character, string $form, int $height, string $date, int $id_company): void
    {
        $db = $this->dbConnect();
        $sql = "UPDATE `figure` SET `full_name` = :full_name, `origin` = :origin, `character` = :character,
        `form` = :form, `height` = :height, `date` = :date, `id_company` = :id_company
        WHERE `id` = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":full_name", $full_name, PDO::PARAM_STR);
        $resultQuery->bindValue(":origin", $origin, PDO::PARAM_STR);
        $resultQuery->bindValue(":character", $character, PDO::PARAM_STR);
        $resultQuery->bindValue(":form", $form, PDO::PARAM_STR);
        $resultQuery->bindValue(":height", $height, PDO::PARAM_INT);
        $resultQuery->bindValue(":date", $date, PDO::PARAM_STR);
        $resultQuery->bindValue(":id_company", $id_company, PDO::PARAM_INT);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    /**
     * Permer la suppression d'une figurine à partir de son id
     * 
     * @param int $id ex. 719
     */
    public function deleteFigure(int $id): void
    {
        $db = $this->dbConnect();
        $sql = "DELETE FROM figure WHERE id = :id";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id", $id, PDO::PARAM_INT);
        $resultQuery->execute();
    }
}
