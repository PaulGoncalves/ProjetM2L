<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=m2l;charset=utf8', 'root', '');
}catch(PDOException $e){
    die('Erreur : '.$e->getMessage());
}

?>