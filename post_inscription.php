<?php 
include_once('mysql.php');
$i=1;

$allDiversStatement=$mysqlclient->query('SELECT * FROM diver');
$allDivers = $allDiversStatement->fetchALL();

$emailcheck=1;
$probleme=2;

foreach($allDivers as $allDivers) :?>
    <?php 
         if($_POST['mail']===$allDivers['email']) : ?>
        <?php 
        $emailcheck=0; ?>

        <? endif; ?>
        
        <?php endforeach; ?>
<? if($emailcheck==0) :?>
    <script type="text/javascript">
    alert('Adresse mail déjà utilisé');
 </script>
 <meta http-equiv="Refresh" content="0;URL=inscription.php">

 <? endif; ?>
<?

// if (
//     (strtotime($_POST['expiration-license']) || strtotime($_POST['expiration-certificat'])) < strtotime(date('Y-m-d'))
//         )
//         {
//             echo('Votre license et/ou votre certificat ne sont plus à jour');
//             return;

//         }

if($emailcheck==1): ?>
<? if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['mail']) || !isset($_POST['password']) || !isset($_POST['naissance']) || !isset($_POST['niveau']) || !isset($_POST['monitoring']) || !isset($_POST['nox']) || !isset($_POST['numero_license'])|| !isset($_POST['expiration-license'])|| !isset($_POST['expiration-certificat']))
        
        { ?>
            <script type="text/javascript">
            alert('Il manque des informations pour finaliser l\'inscription ou les fichiers nes sont pas pris en compte (format accepté: \'jpg, ,jpeg, png, pdf, doc, docx\' et taille max de 5MB )');
         </script>
         <meta http-equiv="Refresh" content="0;URL=inscription.php">

       <?php } 

        else{

            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $mail=$_POST['mail'];
            $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
            $naissance=$_POST['naissance'];
            $niveau=$_POST['niveau'];
            $monitoring=$_POST['monitoring'];
            $nox=$_POST['nox'];
            $numero_license=$_POST['numero_license'];
            $expiration_license=$_POST['expiration-license'];
            $expiration_certificat=$_POST['expiration-certificat'];
            $license=$_FILES['license'];
            $certificat=$_FILES['certificat_medical']; 
            $nom=trim($nom);
            ?> 




     <?   switch($niveau){
                case 'N5': 
                    $privilege1='N5';
                    $PA=60;
                    $PE='max';
                    break;
                case 'N4':
                    $privilege1='N4';
                    $PA=60;
                    $PE='max';
                    break;
                case 'N3':
                    $privilege1='N3';
                    $PA=40;
                    $PE=60;
                    break;
                case 'N2':
                    $privilege1='N2';
                    $PA=20;
                    $PE=40;
                    break;
                case 'N1':
                    $privilege1='N1';
                    $PA=20;
                    $PE=12;
                    break;
        }
        switch($monitoring){
            case 'E4': 
                $privilege2='E4';
                $privilege3='N5';
                break;
            case 'E3':
                $privilege2='E3';
                $privilege3='N5';
                break;
            case 'E2':
                $privilege2='E2';
                $privilege3='N4';
                break;
            case 'E1':
                $privilege2='E1';
                $privilege3='N2';
                break;
            case 'E0':
                $privilege2='aucun';
                $privilege3='aucun';
                break;
    }

    $cond1=false;
    $cond2=false;
    $cond3=false;
    $cond4=false;

    if($privilege2==='E4' || $privilege2==='E3'){
        $privilege=$privilege2;
        $cond1=true;
    }

    if($privilege2==='E2' && $privilege1==='N5'){
        $privilege=$privilege1;
        $cond2=true;
    }

    if($privilege2==='E1' &&($privilege1==='N4' || $privilege1==='N5')){
        $privilege=$privilege1;
        $cond3=true;

    }

    if($privilege2==='aucun'){
        $privilege=$privilege1;
        $cond4=true;
    }

    if(!$cond1 && !$cond2 && !$cond3 && !$cond4) {
        $privilege=$privilege2;
    } ?>

    

<?php 
    if (isset($certificat) && !$certificat['error'] && $certificat['size'] <= '5000000') : 
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur et s'il n'est pas trop gros 
        ?>
    <?php 
     // Testons si l'extension est autorisée
    $fileInfo_certificat = pathinfo($certificat['name']);
    $extension_certificat = $fileInfo_certificat['extension']; 

    ?>
        <?php 
        if (in_array($extension_certificat, ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'])) : 
        ?>
            <?php 
            $problemeCertificat=0;
            ?>
    
        <?php else : ?>

            <?php $problemeCertificat=1; ?>
    
        <?php endif; ?>
    
    <?php else:  ?>


       <?php $problemeCertificat=1; ?>
    <?php endif; ?>



 
   <?  if (isset($license) && !$license['error'] && $license['size'] <= '5000000') : 
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur et s'il n'est pas trop gros 
    ?>
<?php 
 // Testons si l'extension est autorisée
$fileInfo = pathinfo($license['name']);
$extension = $fileInfo['extension']; 
?>
    <?php 
    if (in_array($extension, ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'])) : 
    ?>
        <?php 
        $problemeLicense=0;
        ?>

    <?php else : ?>

        <?php $problemeLicense=1; ?>

    <?php endif; ?>
        <?php else : ?>

            <?php $problemeLicense=1; ?>


<?php endif; ?>

<?php if (!isset($license) || $license['error'] || $license['size'] > '5000000'){

    $probleme=1;

}

 if($emailcheck==1 && $problemeLicense==0 && $problemeCertificat==0){

    if (!is_dir('C:/MAMP/htdocs/tests/uploads/verif/'.$nom.'/')) { //verif que le dossier n'existe pas
        mkdir('C:/MAMP/htdocs/tests/uploads/verif/'.$nom.'/', 0777, true); //si c'est le cas créer un dossier 
        $pre_chemin='C:/MAMP/htdocs/tests/uploads/verif/'.$nom.'/';
    }
    else{
        while(is_dir('C:/MAMP/htdocs/tests/uploads/verif/'.$nom.'('.$i.')/')){ //si le dossier existe (personnes avec le même nom de famille) un indice sera mis à coté du nom du dossier
            $i=$i+1;
        }
        mkdir('C:/MAMP/htdocs/tests/uploads/verif/'.$nom.'('.$i.')/', 0777, true);
        $pre_chemin='C:/MAMP/htdocs/tests/uploads/verif/'.$nom.'('.$i.')/';
    } 

    $chemin_license='' .$pre_chemin. 'lisence.'.$extension. '' ; //enregistre le chemin dans la bdd afin de le réutiliser à l'avenir (car lié à l'utilisateur   )
    $chemin_certificat=''.$pre_chemin. 'certificat.'.$extension_certificat.'' ;

    move_uploaded_file($license['tmp_name'], $chemin_license); 
    move_uploaded_file($certificat['tmp_name'], $chemin_certificat);
            // On peut valider le fichier et le stocker définitivement dans le dossier vérif


   $insertInfo = $mysqlclient->prepare('INSERT INTO diver(Lastname,Firstname,Birthdate,Diver_Qualification,Instructor_Qualification,License_Number,License_Expiration_Date,Medical_Certificate_Expiration_Date,email,password,Nox_Level,privilege,chemin_license,chemin_certificat_medical,confirmer_email,certifie) VALUES (:Lastname, :Firstname, :Birthdate, :Diver_Qualification, :Instructor_Qualification, :License_Number, :License_Expiration_Date, :Medical_Certificate_Expiration_Date, :email, :password, :Nox_Level, :privilege, :chemin_license, :chemin_certificat_medical, :confirmer_email, :certifie)');
    $insertInfo -> execute([
    'Lastname' => $nom,
    'Firstname' => $prenom,
    'Birthdate' => $naissance,
    'Diver_Qualification' => $niveau,
    'Instructor_Qualification' =>$monitoring,
    'License_Number' => $numero_license,
    'License_Expiration_Date' => $expiration_license,
    'Medical_Certificate_Expiration_Date' =>$expiration_certificat,
    'email' =>$mail,
    'password' =>$password,
    'Nox_Level' =>$nox,
    'privilege' =>$privilege,
    'chemin_license' =>$chemin_license,
    'chemin_certificat_medical' =>$chemin_certificat,
    'confirmer_email' => 0,
    'certifie' => 0,
    
]); 

if ($insertInfo->errorCode() !== '00000') {
    $errorInfo = $insertInfo->errorInfo();
    echo 'Erreur lors de l\'exécution de la requête : ' . $errorInfo[2];
}
                }
        }

         endif; 

if($emailcheck==1 && $problemeCertificat==0 && $problemeLicense==0) : ?>       

    <script type="text/javascript">
    alert('Votre compte a bien été créer, veuillez attendre que votre license et votre certificat soit validés afin de vous connecter');
</script>
<meta http-equiv="Refresh" content="0;URL=authentification.php">
<?php endif; ?>

<?php if($problemeCertificat==1 || $problemeLicense==1) : ?>

<script type="text/javascript">
                     alert('Problème avec le fichier certifical médical envoyé, file accepté : \'jpg, ,jpeg, png, pdf, doc, docx\' et taille max de 5MB');
               </script>
               <meta http-equiv="Refresh" content="0;URL=inscription.php">

<?php endif; ?>