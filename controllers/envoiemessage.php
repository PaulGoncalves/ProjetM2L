<?php
include('../model/connexionbdd.php');
session_start();

$id_receveur = htmlspecialchars($_POST['id_receveur']);
$message = htmlspecialchars($_POST['message']);
$datetime = date("d-m-Y H:i:s");

if(!empty($id_receveur) AND $message) {
    
    $insertMP = $bdd->prepare('INSERT INTO message_prive(id_expediteur, id_receveur, message, date) VALUES(:id_expediteur, :id_receveur, :message, NOW())');
    $insertMP->execute(array('id_expediteur' => $_SESSION['id_s'], 'id_receveur' => $id_receveur, 'message' => $message));
    
}

?>