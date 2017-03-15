<?php
include('../model/connexionBdd.php');
include('../model/RecupFormation.php');


//Supprime les formations si la date est déja passé
$req = $bdd->exec('DELETE FROM formation WHERE date_debut <= CURDATE()');

?>