<?php

$reqValid = $bdd->query('SELECT type_formation.type, type_formation.id_f, type_formation.id_s, formation.titre, formation.date_debut, salarie.nom, salarie.prenom
                        FROM formation
                        INNER JOIN type_formation
                        ON formation.id_f = type_formation.id_f
                        INNER JOIN salarie
                        ON type_formation.id_s = salarie.id_s
                        WHERE type = "Refusée"');

?>