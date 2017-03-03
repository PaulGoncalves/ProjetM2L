<?php

include('connexionBdd.php');

$reqRecupFormation = $bdd->query('SELECT * FROM formation');
$donnees = $reqRecupFormation->fetch();

?>