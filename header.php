<?php 
include_once('mysql.php');
?>

<input type="checkbox" name="" id="chk1">
<div class="logo"><img src="media/logo.png"> </div>

<ul>
        <li><a href="acceuil.php">Accueil</a></li>
        <li><a href="#">Agenda des plongées</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li>
                <a href="https://fr.linkedin.com/in/aymane-lamqari-a95815220?trk=people-guest_people_search-card"><i class="fa fa-facebook"></i></a>
                <a href="https://fr.linkedin.com/in/aymane-lamqari-a95815220?trk=people-guest_people_search-card"><i class="fa fa-twitter"></i></a>
                <a href="https://fr.linkedin.com/in/aymane-lamqari-a95815220?trk=people-guest_people_search-card"><i class="fa fa-instagram"></i></a>

        </li>
</ul>
<details class="dd-dropdown">
        <summary role="button">
                <a class="dd-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <title>account</title>
                                <path
                                        d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                        </svg></a>
        </summary>
        <ul>
                <?php if (isset($_SESSION['LOGGED_USER']) && !empty($_SESSION['LOGGED_USER'])): ?>
                        <?php $id=$_SESSION['LOGGED_USER'];
                         $infoUserStatement = $mysqlclient -> query('SELECT * FROM diver WHERE Id_Diver="'.$id.'" ');
                         $infoUser = $infoUserStatement ->fetch(); ?>
                        
                        <li>
                        <div style="text-align:center">
                                        <?php echo ('Bonjour <b>' . $infoUser['Firstname'] . ',</b> '); //à revoir
                                                ?>
                                </div>
                        </li>
                        <li><a href="parametre_compte.php">Mon compte</a></li>
                        <?php if($infoUser['privilege']==='admin') :?>
                        <li><a href="page_admin.php">Admin Pannel</a></li>

                        <?php endif; ?>

                        <li><a href="logout.php">Déconnexion</a></li>


                <?php else: ?>
                        <li><a href="authentification.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                <?php endif; ?>
        </ul>
</details>

<div class="menu">
        <label for="chk1">
                <i class="fa fa-bars"></i>
        </label>
</div>