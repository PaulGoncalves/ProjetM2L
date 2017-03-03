<?php


class requetePanier {
    public static function type() {
        include('../model/connexionbdd.php');
        $insertType = $insertType = $bdd->prepare('INSERT INTO type_formation(type, id_f, id_s) VALUES(?, ?, ?)');
                    $insertType->execute(array($type, $idFormation, $idSalarie));

        return $insertType;
    }
}

?>