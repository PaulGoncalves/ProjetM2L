<?php

$requser = $bdd->query('SELECT * FROM salarie WHERE email = "'.$mail.'"');
$donnees = $requser->fetch();

?>