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
        include('../core/stat.class.php');
        include('../model/listeSalarie&Chef.php');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png" />
        <link rel="icon" type="image/png" href="..img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Gestion - Admin</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!--  Material Dashboard CSS    -->
        <link href="../css/material-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <div class="wrapper">

            <div class="sidebar" data-color="purple" data-image="../img/sidebar-1.jpg">
                <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->

                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">Espace Administrateur</a>
                </div>

                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="active">
                            <a href="dashboard.php?id_s=<?php echo $_SESSION['id_s']; ?>">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="user.php?id_s=<?php echo $_SESSION['id_s']; ?>">
                                <i class="material-icons">person</i>
                                <p>Ajout d'utilisateur</p>
                            </a>
                        </li>
                        <li>
                            <a href="Ajoutformation.php?id_s=<?php echo $_SESSION['id_s']; ?>">
                                <i class="material-icons">content_paste</i>
                                <p>Ajout de formations</p>
                            </a>
                        </li>
                        <li>
                            <a href="messageAdmin.php?id_s=<?php echo $_SESSION['id_s']; ?>">
                                <i class="material-icons text-gray">notifications</i>
                                <p>Message privé</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">person</i>
                                        <p class="hidden-lg hidden-md">Profile</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../controllers/deconnexion.php">Déconnexion</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group  is-empty">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="material-input"></span>
                                </div>
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i><div class="ripple-container"></div>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="orange">
                                        <i class="material-icons" style="font-size:52px">account_box</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Nombre d'utilisateurs</p>
                                        <h3 class="title"><?php echo Statistiques::calculNb("salarie"); ?> utilisateurs</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">library_add</i> <a href="#pablo">Afficher les utilisateurs inscrits</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="green">
                                        <i class="material-icons" style="font-size:52px;">view_list</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Nombre de formations</p>
                                        <h3 class="title"><?php echo Statistiques::calculNb("formation"); ?> formations</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">library_add</i> <a href="#pablo">Afficher les formations</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="red">
                                        <i class="material-icons" style="font-size:52px;">work</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Nombre de salariés</p>
                                        <h3 class="title"><?php echo Statistiques::nbSalarie(); ?> salariés</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">local_offer</i> Tracked from Github
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="blue">
                                        <i class="material-icons" style="font-size:52px;">format_list_bulleted</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Nombre d'inscription aux formations</p>
                                        <h3 class="title"><?php echo Statistiques::nbInscription(); ?> inscriptions</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">update</i> Just Updated
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="orange">
                                        <h4 class="title">Informations des employers</h4>
                                        <p class="category">Texte à mettre</p>
                                    </div>
                                    <div class="card-content table-responsive">
                                        <table class="table table-hover">
                                            <thead class="text-warning">
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Identifiant</th>
                                                <th>Crédits</th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                            
                                                    while($donneesSalarie = $reqSalarie->fetch()) {
                                                    echo '<tr>
                                                            <td>'.$donneesSalarie['nom'].'</td>
                                                            <td>'.$donneesSalarie['prenom'].'</td>
                                                            <td>'.$donneesSalarie['identifiant'].'</td>
                                                            <td>'.$donneesSalarie['nbs_jour'].'</td>
                                                        </tr>';
                                                    }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">library_add</i> <a href="#">Afficher les utilisateurs inscrits</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="dashboard.php">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="http://paulgoncalves-portfolio.esy.es/">
                                        Portfolio
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>

    </body>

    <!--   Core JS Files   -->
    <script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/material.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="../js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../js/demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>

</html>

<?php
    } else {
        $message="Vous devez vous connecter";
        echo $message.'<br />';
        echo '<a href="../view/login.php">Page de connexion</a>';
    }
} else {
    $message="Vous devez vous connecter";
    echo $message.'<br />';
    echo '<a href="../view/login.php">Page de connexion</a>';
}
?>
