<?php session_start();
include_once('mysql.php');


 $id=$_SESSION['LOGGED_USER'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
$infoUser = $infoUserStatement ->fetch();

if($infoUser['privilege'] !== 'admin' || !isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

    <? header('Location: acceuil.php'); ?>
    
    <?php endif; ?>


 <? if($infoUser['privilege'] === 'admin') : ?>

<? $newNom=$_POST['name'];
$newPrenom=$_POST['prenom'];
$newMail=$_POST['email'];
$newDateNaissance=$_POST['dob'];
$newMdp=password_hash($_POST['pwd'], PASSWORD_DEFAULT);
$newNiveauPlongee=$_POST['niveau'];
$newNiveauInstructor=$_POST['monitoring'];
$newNoxNiveau=$_POST['Nox-level'];
$newNumLicense=$_POST['numero_license'];
$newExpirationLicenseDate=$_POST['expiration_license'];
$newExpirationCertificatDate=$_POST['expiration_certificat'];
$newPrivilege =$_POST['privilege'];
$newCertifie=$_POST['certifie'];
$idMembreModif=$_POST['membre_id'];

$modifMembre = $mysqlclient->prepare('UPDATE diver SET Lastname = :Lastname, Firstname = :Firstname, Diver_Qualification = :Diver_Qualification, Instructor_Qualification= :Instructor_Qualification, Nox_Level = :Nox_Level, License_Number = :License_Number, License_Expiration_Date = :License_Expiration_Date, Medical_Certificate_Expiration_Date = :Medical_Certificate_Expiration_Date, Birthdate = :Birthdate, email= :email, password = :password, privilege= :privilege, certifie= :certifie WHERE Id_Diver = :Id_Diver');
$modifMembre ->execute([
    'Lastname'=>$newNom,
    'Firstname'=>$newPrenom,
    'Diver_Qualification' => $newNiveauPlongee,
    'Instructor_Qualification' => $newNiveauInstructor,
    'Nox_Level' =>$newNoxNiveau,
    'License_Number' => $newNumLicense,
    'License_Expiration_Date' => $newExpirationLicenseDate,
    'Medical_Certificate_Expiration_Date' => $newExpirationCertificatDate,
    'Birthdate' => $newDateNaissance,
    'email' => $newMail,
    'password' => $newMdp,
    'privilege' => $newPrivilege,
    'certifie' => $newCertifie,
    'Id_Diver' => $idMembreModif,

]); ?>

<script type="text/javascript">
    alert('Modification enregistrée(s)');
 </script>
 <meta http-equiv="Refresh" content="0;URL=page_admin.php">

 <?php endif; ?>


