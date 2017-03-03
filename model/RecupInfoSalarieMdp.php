<?php

$query = $bdd->prepare('SELECT COUNT(*) AS nbr FROM salarie WHERE email = :mail');
$query->bindValue('mail',$mail, PDO::PARAM_STR);
$query->execute();
$mailexist=($query->fetchColumn()!=0)?1:0;

?>