<?php
include('../model/connexionBdd.php');
session_start();

if(isset($_GET['id_s']) AND $_GET['id_s'] > 0)
{
    $getid = intval($_GET['id_s']);
    $requser = $bdd->prepare('SELECT * FROM salarie WHERE id_s = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    if(isset($_SESSION['id_s']) AND $_GET['id_s'] == $_SESSION['id_s']) {


        include('../controllers/inscriptionSalarie.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrateur</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/responsive.css">
    </head>
    <body>

        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <!-- <li><a href="profilAdmin.php?id_s=<?php echo $_SESSION['id_s']; ?>"><i class="fa fa-user"></i> Mon Compte</a></li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                <li><a href="../controllers/deconnexion.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
        </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="indexAdmin?id_s=<?php echo $_SESSION['id_s']; ?>">Form<span>ation</span></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="indexAdmin?id_s=<?php echo $_SESSION['id_s']; ?>">Accueil</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div><!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Gestion des formations</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    <br />

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="col-md-6">
                    <h3>Ajout d'un nouvel utilisateur</h3>
                    <hr>
                    <div><?php if(isset($_SESSION['$message'])) {echo $_SESSION['$message']; } ?> </div>
                    <form method="POST">
                        <label>Nom : </label><input type="text" name="nom"/>
                        <label>Prenom : </label><input type="text" name="prenom"/>
                        <label>Email : </label><input type="email" name="email"/>
                        <label>Identifiant :</label><input type="text" name="identifiant" />
                        <label>Mot de passe :</label><input type="password" name="mot_de_passe" />
                        <label>Nombre de jours de formations dispo :</label><input type="text" name="nb_jours" />
                        <label>Chef d'équipe : </label>
                        <select name="ChefEquipe">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                        <label>Admin : </label>
                        <select name="Admin">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                        <br />
                        <br />
                        <input type="submit" name="ValidInscription" value="Ajouter l'utilisateur"/><br /><br />
                    </form>
                </div>

                <div class="col-md-6">
                    <form method="post" action="../controllers/adminInsertElement.php">
                        <label>Titre :</label><input type="text" name="titre"/>
                        <label>Coût (Nbs jours) :</label><input type="text" name="cout_jours"/>
                        <label>Date :</label><input type="date" name="date_debut"/>
                        <label>Nombre de places :</label><input type="text" name="nb_place"/>
                        <label>Contenu :</label><textarea type="text" name="contenu"></textarea>

                        <br />

                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1default" data-toggle="tab">Adresse déjà existante</a></li>
                                    <li><a href="#tab2default" data-toggle="tab">Nouvelle adresse</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1default">
                                        
                                    </div>
                                    <div class="tab-pane fade" id="tab2default">
                                        <label>Numéro :</label><input type="text" name="numero" />
                                        <label>rue</label><input type="text" name="rue" />
                                        <label>Ville :</label><input type="text" name="ville" />
                                        <label>Code postal :</label><input type="text" name="ville" />
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" Value="Ajouter" name="validForm"/>
                    </form>
                    
                        <br />
                </div>
            </div>

        </div>
    </div>

    </div>



<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; Créer par <a href="#" target="_blank">Paul Goncalves</a></p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="../js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="../js/main.js"></script>

<?php
    } else {
        $message="Vous devez vous connecter";
        echo $message.'<br />';
        echo '<a href="../view/Login">Page de connexion</a>';
    }
} else {
    $message="Vous devez vous connecter";
    echo $message.'<br />';
    echo '<a href="../view/Login">Page de connexion</a>';
}
?>

</body>
</html>