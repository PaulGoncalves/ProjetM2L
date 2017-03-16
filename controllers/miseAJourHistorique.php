<?php 

$req = $bdd->query('SELECT formation.cout_jours, formation.date_debut, formation.id_f, type_formation.type FROM formation INNER JOIN type_formation ON formation.id_f = type_formation.id_f WHERE type = "Validée" ');
while($donnee = $req->fetch()) {


    $date_actuelle = date('d-m-Y');

    $ajout_date  = $donnee['cout_jours'];

    $date_formation = $donnee['date_debut'];
    $date_plus_jours = date('d-m-Y', strtotime($date_formation.' + '.$ajout_date.' days'));


    if($donnee['type'] == 'Validée') {

        if($date_plus_jours < $date_actuelle ) {

            $type = 'Effectuée';

            $reqUpdate = $bdd->prepare('UPDATE type_formation SET type = :type WHERE type = "Validée" ');
            $reqUpdate->execute(array('type' => $type));


        }

    }
}

?>