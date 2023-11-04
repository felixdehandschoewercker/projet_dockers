<?php session_start();
include_once('mysql.php');

$id=$_SESSION['LOGGED_USER'];

$infoUserStatement = $mysqlclient ->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
$infoUser = $infoUserStatement ->fetch();

if($infoUser['privilege'] !== 'admin' || !isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

    <?php header('Location: acceuil.php'); ?>

    
    <?php endif; ?>


 <?php if($infoUser['privilege'] === 'admin') : ?>

   <!DOCTYPE html>
   <html lang="fr">
   <head>
       <meta charset="UTF-8">
       <title>Profil Utilisateur</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="style.css">
       <link rel="stylesheet" type="text/css" href="sections.css">
   </head>
   <body>
       <header>
                <?php include_once('header.php'); ?>
       </header>
       <section id="hero">
           <div class="layer">
             <div class="hero-content">
   
             </div>
             
           </section>
           <?php $membre_modif=$_POST['membre_modif'];

$membreAmodifStatement = $mysqlclient->query('SELECT * FROM diver WHERE Id_Diver="'.$membre_modif.'"');
$membreAmodif=$membreAmodifStatement->fetch(); ?>

<?php $license=substr($membreAmodif['chemin_license'],21); 
$certificat=substr($membreAmodif['chemin_certificat_medical'],21); ?>
       <div class="profile-container">
           <h2>Info de <?php echo(''. $membreAmodif['Firstname']. ' ' .$membreAmodif['Lastname']. ''); ?></h2>
           <form action='post_update_compte_admin.php' method='POST'>
               <label for="name">Modifier nom:</label>
               <input type="text" id="name" name="name" value="<?php echo($membreAmodif['Lastname']); ?>">
   
               <label for="prenom">Modifier prenom:</label>
               <input type="text" id="prenom" name="prenom" value="<?php echo($membreAmodif['Firstname']); ?>">
   
               <label for="email">Modifier email:</label>
               <input type="email" id="email" name="email" value="<?php echo($membreAmodif['email']); ?>">
   
               <label for="dob">Modifier date de naissance:</label>
               <input type="date" id="dob" name="dob" value="<?php echo($membreAmodif['Birthdate']); ?>">
   
               <label for="new-pwd">Modifier Le Mot de passe:</label>
               <input type="texte" id="pwd" name="pwd" value="<?php echo($membreAmodif['password']); ?>">

                <label for="niveau">Niveau de plongée :</label>
                <select id="niveau" name="niveau">
                    <option value="<?php echo($membreAmodif['Diver_Qualification']); ?>"><?php echo($membreAmodif['Diver_Qualification']); ?></option>
                    <option value="N1">Niveau 1</option>
                    <option value="N2">Niveau 2</option>
                    <option value="N3">Niveau 3</option>
                    <option value="N4">Niveau 4</option>
                    <option value="N5">Niveau 5</option>
                </select>

                <label for="niveau">Niveau de monitoring :</label>
                <select id="monitoring" name="monitoring" >
                    <option value="<?php echo($membreAmodif['Instructor_Qualification']); ?>"><?php echo($membreAmodif['Instructor_Qualification']); ?></option>
                    <option value="E0">Aucun</option>
                    <option value="E1">E1</option>
                    <option value="E2">E2</option>
                    <option value="E3">E3</option>
                    <option value="E4">E4</option>
                </select>


               <label for="Nox-level">Modifier niveau Nox:</label>
               <input type="text" id="Nox-level" name="Nox-level" value="<?php echo($membreAmodif['Nox_Level']); ?>">

               <label for="numero_license">Modifier numéro de license:</label>
               <input type="text" id="numero_license" name="numero_license" value="<?php echo($membreAmodif['License_Number']); ?>">

               <label for="expiration_license">Modifier date d'expiration de license:</label>
               <input type="date" id="expiration_license" name="expiration_license" value="<?php echo($membreAmodif['License_Expiration_Date']); ?>">

               <a href="<?php echo($license) ;?>" download="license de <?php echo($membreAmodif['Lastname']); ?>">Téléchargez la license de <?echo(''.$membreAmodif['Firstname'].' '.$membreAmodif['Lastname']. ''); ?></a>  

               <label for="expiration_certificat">Modifier date d'expiration du certificat médical:</label>
               <input type="date" id="expiration_certificat" name="expiration_certificat" value="<?php echo($membreAmodif['Medical_Certificate_Expiration_Date']); ?>">

               <a href="<?php echo($certificat) ;?>" download="certificat de <?php echo($membreAmodif['Lastname']); ?>">Téléchargez le certificat médical de <?echo(''.$membreAmodif['Firstname'].' '.$membreAmodif['Lastname']. ''); ?></a>
           
               <label for="niveau">Privilege :</label>
                <select id="privilege" name="privilege">
                    <option value="<?php echo($membreAmodif['privilege']); ?>"><?php echo($membreAmodif['privilege']); ?></option>
                    <option value="E0">Aucun</option>
                    <option value="N1">Niveau 1</option>
                    <option value="N2">Niveau 2</option>
                    <option value="N3">Niveau 3</option>
                    <option value="N4">Niveau 4</option>
                    <option value="N5">Niveau 5</option>
                    <option value="E1">E1</option>
                    <option value="E2">E2</option>
                    <option value="E3">E3</option>
                    <option value="E4">E4</option>
                    <option value="admin">admin</option>
                </select>

                <label for="certifie">Certifié : </label>
                <select id="certifie" name="certifie" >
                    <option value="<?php echo($membreAmodif['certifie']) ; ?>"><?php if($membreAmodif['certifie']==1){echo('oui');}else{echo('non');} ?></option>
                    <option value="0">Non</option>
                    <option value="1">Oui</option>

                    <label for="membre_id" class="form-label"></label>
                        <input type="hidden" class="form-control" id="membre_id" name="membre_id" value="<?php echo($membreAmodif['Id_Diver']); ?> ">

                        <button type="submit" class="btn btn-danger">Enregistrer les modifications</button>
            </form>


           <br>
       </div>
       <br>
   </body>
   </html>

   <?php endif; ?>
     