<?php

$reqhistorique = $bdd->query('SELECT type_formation.id_f, type_formation.id_t, type_formation.type, type_formation.id_s, formation.titre,
                        formation.cout_jours,formation.date_debut, formation.nb_place, formation.contenu, formation.id_f, salarie.nom, salarie.prenom, salarie.nbs_jour
                        FROM formation 
                        INNER JOIN type_formation
                        ON formation.id_f = type_formation.id_f
                        INNER JOIN salarie
                        ON type_formation.id_s = salarie.id_s
                        WHERE salarie.id_s = '.$_SESSION['id_s'].'
                        ORDER BY type DESC');

while($donnees = $reqhistorique->fetch()) {
    echo '<tr class="'.$donnees['type'].'">
            <td>'.$donnees['titre'].'</td>
            <td>'.date("d/m/Y", strtotime($donnees['date_debut'])).'</td>
            <td>'.$donnees['type'].'</td>
        </tr>';
}
?>