<?php
include_once('../core/mdp.class.php');

$mdp = mdp::generer_mot_de_passe("10");

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
{
    $passage_ligne = "\r\n";
}
else
{
    $passage_ligne = "\n";
}

$header = 'From: "Site m2l - Goncalves Paul" <m2l-paulgoncalves@alwaysdata.net>'.$passage_ligne;
$header .= 'MIME-Version: 1.0'.$passage_ligne;
$header .= 'Content-Type: text/html;'.$passage_ligne.' boundary="$boundary"'.$passage_ligne;


$destinataire = $mail; //---------------------------------------------------------- a modifier ---------------------------------

$sujet = 'Modification du mot de passe de Paul Goncalves sur le site M2L';

$message = '<html align="center">
            <h2 align="center">Modification du mot de passe</h2>
            <p align="center">Nous vous informons que votre mot de passe à bien été changé.</p>
            <p align="center">Votre nouveau mot de passe est :<strong>'.$mdp.'</strong></p>
            <p align="center">Pour vous connecter à nouveau sur le site M2L, entrez ce nouveau mot de passe.</p>
            </html>';

mail($destinataire, utf8_decode($sujet), utf8_decode($message), $header);

?>