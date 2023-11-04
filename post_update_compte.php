<?php session_start();
include_once('mysql.php');

if(!isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

    <?php header('Location: acceuil.php'); ?>
    
    <?php endif; ?>

<?php $id=$_SESSION['LOGGED_USER'];

$idMembreModif=$_POST['membre_id'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$idMembreModif.'"');
$infoUser = $infoUserStatement ->fetch();


 ?>
<?php if(password_verify($_POST['pwd'], $infoUser['password'])) :?>
<?php $newMail=$_POST['Mail'];

if(empty($_POST['new-pwd'])){
    $newMdp=$infoUser['password'];
}
else{
$newMdp=password_hash($_POST['new-pwd'], PASSWORD_DEFAULT);
}


$modifMembre = $mysqlclient ->prepare('UPDATE diver SET password = :password, email = :email WHERE Id_Diver = :Id_Diver');
$modifMembre ->execute([
    'password'=>$newMdp,
    'email'=>$newMail,
    'Id_Diver' => $idMembreModif,
]); 

if ($modifMembre->errorCode() !== '00000') {
    $errorInfo = $modifMembre->errorInfo();
    echo 'Erreur lors de l\'exécution de la requête : ' . $errorInfo[2];
} ?>

  <?php endif ; ?>


<?php if(!password_verify($_POST['pwd'], $infoUser['password'])) : ?>
    <script type="text/javascript">
    alert('Mot de passe incorrect');
 </script>
 <meta http-equiv="Refresh" content="0;URL=parametre_compte.php">

 <?php endif; ?>


<?php if(password_verify($_POST['pwd'], $infoUser['password'])) :?>
 <script type="text/javascript">
    alert('Modification enregistrée(s)');
 </script>
 <meta http-equiv="Refresh" content="0;URL=parametre_compte.php">

<?php endif; ?>





