<?php
class Serie extends Database {

    public function getSerieName(int $id_serie) {
        $db = $this->dbConnect();
        $sql = "SELECT `serie` FROM `serie` WHERE id = :id_serie";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_serie", $id_serie, PDO::PARAM_INT);
        $resultQuery->execute();
        $result = $resultQuery->fetch();
        return $result['serie'];
    }

    public function getAllSeries() {
        $db = $this->dbConnect();
        $sql = "SELECT * FROM `serie` ORDER BY `serie`.`serie`;";
        $resultQuery = $db->query($sql);
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSerie(string $serie) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO serie(serie) VALUES (:serie)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(':serie', $serie, PDO::PARAM_STR);
        $resultQuery->execute();
    }

    public function getFigureSeries(int $id_figure){
        $db = $this->dbConnect();
        $sql = "SELECT serie.id, serie.serie FROM serie
        INNER JOIN figure_serie ON figure_serie.id = serie.id
        WHERE figure_serie.id_figure = :id_figure";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFigureSerie(int $id_serie, int $id_figure) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO figure_serie VALUES(:id_serie, :id_figure)";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_serie", $id_serie, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->execute();
    }

    public function removeFigureSerie(int $id_serie, int $id_figure) {
        $db = $this->dbConnect();
        $sql = "DELETE FROM figure_serie WHERE id = :id_serie AND id_figure = :id_figure";
        $resultQuery = $db->prepare($sql);
        $resultQuery->bindValue(":id_serie", $id_serie, PDO::PARAM_INT);
        $resultQuery->bindValue(":id_figure", $id_figure, PDO::PARAM_INT);
        $resultQuery->execute();
    }
}