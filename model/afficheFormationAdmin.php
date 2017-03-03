<?php

$reponse = $bdd->query('SELECT * from formation ORDER BY date_debut');
while ($donneesformations = $reponse->fetch()){

echo '<tr id="'.$donneesformations['id_f'].'">
        <td>'.$donneesformations['titre'].'</td>
        <td align="center">'.$donneesformations['cout_jours'].'</td>
        <td align="center">'.date("d/m/Y", strtotime($donneesformations['date_debut'])).'</td>
        <td align="center">'.$donneesformations['nb_place'].'</td>
        <td>'.$donneesformations['contenu'].'</td>
    </tr>';
                                              }
$reponse->closeCursor();
?>