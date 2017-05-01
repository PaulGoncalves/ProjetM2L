<?php

class Statistiques {


    public static function calculNb($table) {

        include('../model/connexionBdd.php');

        $reqStat = $bdd->query('SELECT COUNT(*) FROM '.$table);
        $donnees = $reqStat->fetch();
        $nb = $donnees[0];

        return $nb;

    }

    public static function nbSalarie() {

        include('../model/connexionBdd.php');

        $reqSalarie = $bdd->query('SELECT COUNT(*) FROM salarie WHERE chef = "0" AND admin = "0"');
        $donnees = $reqSalarie->fetch();
        $nb = $donnees[0];

        return $nb;
    }

    public static function nbInscription() {


        include('../model/connexionBdd.php');

        $reqStat = $bdd->query('SELECT COUNT(*) FROM type_formation WHERE type = "En attente" OR type = "Validée"');
        $donnees = $reqStat->fetch();
        $nb = $donnees[0];

        return $nb;

    }

}

?>