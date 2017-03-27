<?php

$requser = $bdd->query('SELECT * FROM salarie WHERE chef = 0 AND admin = 0 ORDER BY id_s');

?>