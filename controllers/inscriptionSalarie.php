<?php


if(isset($_POST['ValidInscription'])) {
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['identifiant']) AND !empty($_POST['email']) AND !empty($_POST['mot_de_passe']) AND !empty($_POST['nb_jours']) AND !empty($_POST['numero']) AND !empty($_POST['rue']) AND !empty($_POST['codePostal']) AND !empty($_POST['ville'])) {


        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $mdp = htmlspecialchars($_POST['mot_de_passe']);
        $nb_jours = htmlspecialchars($_POST['nb_jours']);
        $chefEquipe = htmlspecialchars($_POST['ChefEquipe']);
        $Admin = htmlspecialchars($_POST['Admin']);
        $numero = htmlspecialchars($_POST['numero']);
        $rue = htmlspecialchars($_POST['rue']);
        $codePostal = htmlspecialchars($_POST['codePostal']);
        $ville = htmlspecialchars($_POST['ville']);

        if (preg_match("#^[a-zA-ZéèêëùàîïöôËÄÖÜÊÂÔÛ ]{3,35}+$#", $nom)) {

            if (preg_match("#^[a-zA-ZéèêëùàîïöôËÄÖÜÊÂÔÛ \-]{3,35}+$#", $prenom)) {

                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {

                    if (preg_match("#^[a-zA-ZéèêëùàîïöôËÄÖÜÊÂÔÛ0-9]{3,35}+$#", $identifiant)) {

                        $SelectIdentifiant = $bdd->prepare('SELECT COUNT(*) AS nbr FROM salarie WHERE identifiant =:identifiant');
                        $SelectIdentifiant->bindValue('identifiant',$identifiant, PDO::PARAM_STR);
                        $SelectIdentifiant->execute();
                        $identifiantdispo=($SelectIdentifiant->fetchColumn()==0)?1:0;
                        $SelectIdentifiant->CloseCursor();

                        if($identifiantdispo) {

                            if (preg_match("#^[a-zA-ZéèêëùàîïöôËÄÖÜÊÂÔÛ0-9]{6,24}+$#", $mdp)) {

                                $mdp = md5($mdp);

                                if(preg_match("#^[0-9]+$#", $nb_jours)) {

                                    if(preg_match("#^[0-1]+$#", $Admin)) {

                                        if(preg_match("#^[0-1]+$#", $chefEquipe)) {

                                            if(preg_match("#^[0-9(Bis|Ter|Quat|bis|ter|quat) ]+$#", $numero)) {

                                                if(preg_match("#^[a-zA-ZéèêëùàîïöôËÄÖÜÊÂÔÛ ]+$#", $rue)) {

                                                    if(preg_match("#^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}+$#", $codePostal)) {

                                                        if(preg_match("#^[a-zA-ZéèêëùàîïöôËÄÖÜÊÂÔÛ ]+$#", $ville)) {

                                                            $reqAdresse = $bdd->prepare('INSERT INTO adresse(ville, rue, numero_rue, code_postal) VALUES(:ville, :rue, :numero_rue, :code_postal)');
                                                            $reqAdresse->execute(array('ville' => $ville, 'rue' => $rue, 'numero_rue' => $numero, 'code_postal' => $codePostal));
                                                            $id_a = $bdd->lastInsertId();

                                                            $insertsalarie = $bdd->prepare('INSERT INTO salarie (nom, prenom, email, identifiant, mot_de_passe, nbs_jour, chef, admin, id_a)VALUES(:nom, :prenom, :email, :identifiant, :mot_de_passe, :nbs_jour, :chef, :admin, :id_a)');
                                                            $insertsalarie->execute(array('nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'identifiant' => $identifiant, 'mot_de_passe' => $mdp, 'nbs_jour' => $nb_jours, 'chef' => $chefEquipe, 'admin' => $Admin, 'id_a' => $id_a));
                                                            $message = '<p align="center" class="vert-text font-18px">L\'utilisateur a bien été ajouté.</p>';
                                                            header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);

                                                        } else {
                                                            $message = '<p align="center" class="vert-text font-18px">La ville n\'est pas valide</p>';
                                                header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                                                        }

                                                    } else {
                                                        $message = '<p align="center" class="vert-text font-18px">Le code postal n\'est pas valide</p>';
                                                header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                                                    }

                                                } else {

                                                    $message = '<p align="center" class="vert-text font-18px">Le nom de rue n\'est pas valide</p>';
                                                header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                                                }

                                            } else {

                                                $message = '<p align="center" class="vert-text font-18px">Le numéro de rue n\'est pas valide</p>';
                                                header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                                            }

                                        } else {

                                            $message = '<p align="center" class="vert-text font-18px">Les valeurs Chef d\'équipe ne sont pas valide</p>';
                                            header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                                        }

                                    } else {

                                        $message = '<p align="center" class="vert-text font-18px">Les valeurs admin ne sont pas valide</p>';
                                        header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                                    }

                                } else {

                                    $message = '<p align="center" class="vert-text font-18px">Le nombre de jour n\'est pas valide</p>';
                                    header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                                }

                            } else {

                                $message = '<p align="center" class="vert-text font-18px">Le mot de passe n\'est pas valide</p>';
                                header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                            }
                        } else {

                            $message = '<p align="center" class="vert-text font-18px">L\'identifiant est déjà utilisé</p>';
                            header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                        }

                    } else {

                        $message = '<p align="center" class="vert-text font-18px">L\'identifiant n\'est pas valide</p>';
                        header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                    }

                } else {

                    $message = '<p align="center" class="vert-text font-18px">Le mail n\'est pas valide</p>';
                    header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
                }

            } else {

                $message = '<p align="center" class="vert-text font-18px">Le prénom n\'est pas valide</p>';
                header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
            }

        } else {

            $message = '<p align="center" class="vert-text font-18px">Le nom n\'est pas valide</p>';
            header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
        }

    } else {
        $message = '<p align="center" class="rouge-text font-18px">Vous devez remplir tous les champs.</p>';
        header('Location: ../view/user.php?id_s='.$_SESSION['id_s'].'&message='.$message);
    }
}

?>