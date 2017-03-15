<?php
include('../model/connexionBdd.php');

$reqq = $bdd->query('SELECT type_formation.id_f, type_formation.id_t, type_formation.type, type_formation.id_s, formation.titre, formation.cout_jours,                       formation.date_debut, formation.nb_place, formation.contenu, formation.id_f, salarie.nom, salarie.prenom, salarie.nbs_jour
                        FROM formation 
                        INNER JOIN type_formation
                        ON formation.id_f = type_formation.id_f
                        INNER JOIN salarie
                        ON type_formation.id_s = salarie.id_s
                        WHERE type = "Validée"');
$donnees = $reqq->fetch();

$date_debut = date('d-m-Y');
$date_expire = $date_debut;
//Nbre de jours plus tard
$nbs_jour = $donnees['cout_jours'];
$nbre = -1 + $nbs_jour;
$tmp=explode('-', $date_expire);
$jour = $tmp[1]; // on récupère le jour
$mois = $tmp[2]; // puis le mois
$annee = $tmp[0]; // l'annee ...

$date_expiration = mktime($jour, $mois, $annee)+ 24*3600*$nbre;
$datePlusjours = date("d-m-Y", $date_expiration);

echo $date_debut.'<br />';
echo $datePlusjours.'<br />';

if($date_debut <= $datePlusjours) {

    $type = 'Effectuée';
    $reqFormpasse = $bdd->prepare('UPDATE type_formation SET type = :type WHERE id_s = '.$_SESSION['id_s']);
    $reqFormpasse->execute(array('type' => $type));

} else {
    echo 'Validé';
}






?>