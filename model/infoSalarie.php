<?php
include('connexionBdd.php');

$requser = $bdd->query('SELECT * FROM salarie WHERE id_s='.$_SESSION['id_s']);
$userinfo = $requser->fetch();

?>