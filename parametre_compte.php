<?php session_start();
include_once('mysql.php');
$id=$_SESSION['LOGGED_USER'];

if(!isset($_SESSION['LOGGED_USER']) || empty($_SESSION['LOGGED_USER'])): ?>

<?header('Location: acceuil.php'); ?>

<?else : ?>
    <!DOCTYPE html>
<html lang="fr">
<head>
  <title>Page d'accueil - Site de Plongée</title>
  <meta charset="UTF-8"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="sections.css">
</head>
<body>
  <header>
  <?php include_once('header.php'); ?>
  </header>
  <section id="hero">

    <div class="hero-content">
      <h1> Gestion de Compte </h1>
      </div>

    
  </section>

        <?php $infoUserStatement = $mysqlclient->query('SELECT * FROM diver WHERE Id_Diver="'.$id.'"');
        $infoUser= $infoUserStatement->fetch(); ?>

<?php $license=substr($infoUser['chemin_license'],21); 
$certificat=substr($infoUser['chemin_certificat_medical'],21); ?>


    <div class="profile-container">
        <h2>Profil de <?php echo($infoUser['Firstname']); ?> <?php echo($infoUser['Lastname']); ?></h2>
        <form action='post_update_compte.php' method='POST'>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" value="<?php echo($infoUser['Lastname']); ?>" readonly>

            <label for="prenom">Prenom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo($infoUser['Firstname']); ?>" readonly>

            <label for="email">Modifier l'adresse mail:</label>
            <input type="email" id="Mail" name="Mail" value="<?php echo($infoUser['email']); ?>">


            <label for="dob">Date de naissance:</label>
            <input type="date" id="dob" name="dob" value="<?php echo($infoUser['Birthdate']); ?>" readonly>

            <label for="new-pwd">Modifier le mot de passe:</label>
            <input type="password" id="new-pwd" name="pwd" placeholder="Nouveau mot de passe">

            <label for="Nox-level">Niveau Nox:</label>
               <input type="text" id="Nox-level" name="Nox-level" value="<?php echo($infoUser['Nox_Level']); ?>" readonly>

               <label for="niveau">Niveau de plongée:</label>
               <input type="text" id="niveau" name="niveau" value="<?php echo($infoUser['Diver_Qualification']); ?>" readonly>

               <label for="monitoring">Niveau d'instructeur:</label>
               <input type="text" id="monitoring" name="monitoring" value="<?php echo($infoUser['Instructor_Qualification']); ?>" readonly>
            

            <label for="numero-license">Numero license :</label>
            <input type="text" id="numero-license" name="numero-license" value="<?php echo($infoUser['License_Number']); ?>" readonly>

            <label for="date_expiration_license">Date d'expiration de license:</label>
            <input type="date" id="date_expiration_license" name="date_expiration_license" value="<?php echo($infoUser['License_Expiration_Date']); ?>" readonly>
<br>
            <a href="<?php echo($license) ;?>" download="license de <?php echo($infoUser['Lastname']); ?>">Téléchargez votre license</a>  

            <label for="expiration_certificat">Date d'expiration du certificat médical:</label>
               <input type="date" id="expiration_certificat" name="expiration_certificat" value="<?php echo($infoUser['Medical_Certificate_Expiration_Date']); ?>" readonly>

               <a href="<?php echo($certificat) ;?>" download="certificat de <?php echo($infoUser['Lastname']); ?>">Téléchargez votre certificat médical</a>
<br>
<label for="pwd">Entrez votre mot de passe actuel pour valider:</label>

<input type="password" id="pwd" name="pwd" placeholder="Mot de passe">

               <button type="submit" class="btn btn-danger">Enregistrer les modifications</button>
        </form>
        <br>
    </div>
    <br>
</body>
</html>
<?php endif; ?>