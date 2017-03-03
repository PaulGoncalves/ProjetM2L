<?php
include('../model/connexionBdd.php');

$reqtype = $bdd->query('SELECT type_formation.id_f, type_formation.id_t, type_formation.type, type_formation.id_s, formation.titre, formation.cout_jours,                           formation.date_debut, formation.nb_place, formation.contenu, formation.id_f, salarie.nom, salarie.prenom, salarie.nbs_jour
                        FROM formation 
                        INNER JOIN type_formation
                        ON formation.id_f = type_formation.id_f
                        INNER JOIN salarie
                        ON type_formation.id_s = salarie.id_s
                        WHERE type = "En attente"');

while($donnees = $reqtype->fetch()) {
    echo '<tr>
            <td><p class="orange-text"><i class="fa fa-spinner fa-pulse fa-fw"></i> '.$donnees['type'].'</p></td>
            <td>'.$donnees['titre'].'</td>
            <td>'.date("d/m/Y", strtotime($donnees['date_debut'])).'</td>
            <td>'.$donnees['nb_place'].'</td>
            <td>'.$donnees['nom'].' '.$donnees['prenom'].'</td>
            <td><a class="vert-text" href="../model/accepteFormation.php?id_s='.$_SESSION['id_s'].'&id_formation='.$donnees['id_f'].'&id_salarie='.$donnees['id_s'].'"> <i class="fa fa-check fa-2x" aria-hidden="true"></i> </a></td>
            <td><a class="rouge-text" href="../model/refuseFormation.php?id_s='.$_SESSION['id_s'].'&id_formation='.$donnees['id_f'].'&id_salarie='.$donnees['id_s'].'"> <i class="fa fa-times fa-2x" aria-hidden="true"></i> </a></td>
        </tr>';
}


?>