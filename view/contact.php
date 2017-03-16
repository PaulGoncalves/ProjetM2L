<?php
session_start();
include('../model/infoSalarie.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact</title>

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
                                <li><a href="profil.php?id_s=<?php echo $_SESSION['id_s']; ?>"><i class="fa fa-user"></i> Mon Compte</a></li>

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
                        <h1><a href="index.php?id_s=<?php echo $_SESSION['id_s']; ?>">Form<span>ation</span></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a>Crédits : <span class="cart-amunt"> <?php echo $userinfo['nbs_jour']; ?></span><i class="fa fa-credit-card" aria-hidden="true"></i></a>
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
                        <li><a href="index.php?id_s=<?php echo $_SESSION['id_s']; ?>">Accueil</a></li>
                        <li><a href="formations.php?id_s=<?php echo $_SESSION['id_s']; ?>">Liste des formations</a></li>
                        <li class="active"><a href="contact.php?id_s=<?php echo $_SESSION['id_s']; ?>">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    <div class="container">
        <div class="row">
            <div class="row page_6" id="page_6">
                <form class="col-md-6 col-lg-6 col-xs-12 col-sm-12 contact" method="POST" action="#contact">
                    <div>
                        <label>Nom :</label>
                        <input type="text" name="nom" placeholder="Votre Nom"/> <br /><br /><br />
                    </div>
                    <div>
                        <label>Courriel :</label>
                        <input type="email" name="mail" placeholder="Votre mail"/> <br /><br /><br />
                    </div>
                    <div>
                        <label>Message :</label>
                        <textarea name="message" placeholder="Votre message"></textarea> <br /><br /><br />
                    </div>
                    <div class="button" id="bouton_form">
                        <input class="boutton" type="submit" name="mailform" value="Envoyer votre message"/>
                    </div>
                </form>
                <iframe class="col-xs-12 col-sm-12 col-md-6 col-lg-6"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.014762789856!2d2.390179616028328!3d48.857928879287364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66d8b04f6a0c3%3A0x1ceac17c26c68bf9!2sITIC+Paris!5e0!3m2!1sfr!2sfr!4v1474480150287" width="800" height="600" frameborder="0" style="border:0" allowfullscreen>
                </iframe>
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
    </body>
</html>