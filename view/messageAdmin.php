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

        include('../core/stat.class.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Message - Admin</title>

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
                        <li>
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
                        <li class="active">
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
                            <a class="navbar-brand" href="#">Ajout de formations</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">dashboard</i>
                                        <p class="hidden-lg hidden-md">Dashboard</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">notifications</i>
                                        <span class="notification">5</span>
                                        <p class="hidden-lg hidden-md">Notifications</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Mike John responded to your email</a></li>
                                        <li><a href="#">You have 5 new tasks</a></li>
                                        <li><a href="#">You're now friend with Andrew</a></li>
                                        <li><a href="#">Another Notification</a></li>
                                        <li><a href="#">Another One</a></li>
                                    </ul>
                                </li>
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
                            <form method="POST" action="../controllers/envoiemessage.php">
                                <select name="id_receveur">
                                    <?php

                                        $reqreceveur = $bdd->query('SELECT * FROM salarie WHERE id_s != '.$_SESSION['id_s']);

                                        while($donnees = $reqreceveur->fetch()) {
                                            echo '<option value="'.$donnees['id_s'].'">'.$donnees['nom'].'</option>';
                                        }

                                    ?>
                                </select>
                                <textarea name="message"></textarea>
                                <input type="submit" name="validmessage"/>
                            </form>
                            
                            <?php $req = $bdd->query('SELECT * FROM message_prive WHERE id_receveur = '.$_SESSION['id_s']);
                                    
        
                            ?>
                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" data-background-color="blue">
                                        <h4 class="title">Messages reçu</h4>
                                    </div>
                                    <div class="card-content">
                                        
                                        <?php 
                                        while($donn = $req->fetch()) {
                                            
                                             echo '<br />
                                        <div>
                                        <h4  class="card-header" data-background-color="green">'.$donn['message'].'</h4>
                                        <br />
                                        <p style="font-size:12px;" align="center">'.$donn['date'].'</p>
                                        </div>';
                                        
                                        } ?>
                                        
                                       
                                        
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
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
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