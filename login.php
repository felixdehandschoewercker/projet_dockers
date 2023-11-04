<?php
include_once('mysql.php');


$username=strip_tags($_POST['username']);
$mdp=strip_tags($_POST['password']);

$allDiversStatement=$mysqlclient->query('SELECT * FROM diver');
$allDivers = $allDiversStatement->fetchALL();

$loginStatement= $mysqlclient -> query('SELECT * FROM diver WHERE email="'.$username.'"');
// $loginStatement->execute(array($username));
$login=$loginStatement->fetch();


if($login['certifie']==0) : ?>
<script type="text/javascript">
                     alert('Vos documents n\'ont pas encore été validés, veuillez patienter');
               </script>
               <meta http-equiv="Refresh" content="0;URL=authentification.php">

<?php endif; ?>


<?php if($login['certifie']==1){
if(isset($login['password'])){
    if(password_verify($mdp,$login['password'])){
        session_start();

            $_SESSION['LOGGED_USER']=$login['Id_Diver'];
            $_SESSION['nom']=$login['Lastname'];
            $_SESSION['prenom']=$login['Firstname'];

            }

        header('location: acceuil.php'); 
        }
    



    
    
    else{
        header('Location: authentification.php');
    }

}


?>