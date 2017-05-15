<?php
include('connexionBdd.php');

$reqSalarie = $bdd->query('SELECT * FROM salarie WHERE admin = 0 LIMIT 5');
?>