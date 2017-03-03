<?php
include('connexionBdd.php');

$reqValid = $bdd->query('SELECT type_formation.type, type_formation.id_f, type_formation.id_s, formation.titre, formation.date_debut, salarie.nom, salarie.prenom
                        FROM formation
                        INNER JOIN type_formation
                        ON formation.id_f = type_formation.id_f
                        INNER JOIN salarie
                        ON type_formation.id_s = salarie.id_s
                        WHERE type = "Validée"');

while($donnees = $reqValid->fetch()) {
    echo '<tr>
            <td>'.$donnees['titre'].'</td>
            <td>'.date("d/m/Y", strtotime($donnees['date_debut'])).'</td>
            <td>'.$donnees['nom'].'</td>
            <td>'.$donnees['prenom'].'</td>
            <td><p class="vert-text"><i class="fa fa-check-square-o" aria-hidden="true"></i> '.$donnees['type'].'</p></td>
        </tr>';
}

?>