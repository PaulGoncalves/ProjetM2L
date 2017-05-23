<?php
include('connexionBdd.php');

$reqFormations = $bdd->query('SELECT * FROM formation');

?>