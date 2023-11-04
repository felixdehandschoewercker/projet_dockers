<?php session_start();
include_once('mysql.php');

$id=$_SESSION['LOGGED_USER'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
$infoUser = $infoUserStatement ->fetch();

if($infoUser['privilege'] !== 'admin' || !isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

    <? header('Location: acceuil.php'); ?>
    
    <?php endif; ?>
<? $membreAsupprimer=$_POST['supprimer_membre'];

$suppMembre = $mysqlclient ->prepare('DELETE FROM diver WHERE Id_Diver="'.$membreAsupprimer.'"');
$suppMembre ->execute(); ?>

<script type="text/javascript">
                     alert('L\'utilisateur a bien été supprimée');
               </script>
               <meta http-equiv="Refresh" content="0;URL=page_admin.php">