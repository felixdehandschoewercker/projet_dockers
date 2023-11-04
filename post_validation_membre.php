<?php session_start();
include_once('mysql.php'); 

$id=$_SESSION['LOGGED_USER'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
$infoUser = $infoUserStatement ->fetch();

if($infoUser['privilege'] !== 'admin' || !isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

<? header('Location: authentification.php'); ?>

<?php endif; ?>

<? $membreAcertifie = $_POST['certifie'];

$certif = $mysqlclient ->prepare('UPDATE diver SET certifie = :certifie WHERE Id_Diver = :Id_Diver');
$certif->execute([
    'certifie'=>1,
    'Id_Diver'=>$membreAcertifie,
]);

header('Location: page_admin.php');

?>

