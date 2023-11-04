<?php 
include_once('mysql.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="stylereservation.css">
    
</head>
<body>

    <h1>Formulaire d'inscription</h1>
    <form action='post_inscription.php' method='post' enctype='multipart/form-data'>
    <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="expiration-license">Date de naissance :</label>
            <input type="date" id="naissance" name="naissance" required>
</div>
        <div class="form-group">
            <label for="mail">E-mail :</label>
            <input type="text" id="mail" name="mail" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau de plongée :</label>
            <select id="niveau" name="niveau" required>
                <option value="">-- Sélectionnez --</option>
                <option value="N1">Niveau 1</option>
                <option value="N2">Niveau 2</option>
                <option value="N3">Niveau 3</option>
                <option value="N4">Niveau 4</option>
                <option value="N5">Niveau 5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau de monitoring :</label>
            <select id="monitoring" name="monitoring" required>
                <option value="">-- Sélectionnez --</option>
                <option value="E0">Aucun</option>
                <option value="E1">E1</option>
                <option value="E2">E2</option>
                <option value="E3">E3</option>
                <option value="E3">E4</option>
            </select>
        </div>
        <div class="form-group">
            <label for="prenom">Niveau Nox :</label>
            <input type="text" id="nox" name="nox" required>
        </div>
        <div class="form-group">
            <label for="numero_license">Numéro de licence :</label>
            <input type="text" id="numero_license" name="numero_license" required>
        </div>
        <div class="form-group">
            <label for="documents">Charger license :</label>
            <input type="file" id="documents" name="license" multiple>
        </div>
        <div class="form-group">
            <label for="expiration-license">Date d'expiration de la licence :</label>
            <input type="date" id="expiration-license" name="expiration-license" required>
        </div>
        <div class="form-group">
            <label for="expiration-certificat">Date d'expiration du certificat médical :</label>
            <input type="date" id="expiration-certificat" name="expiration-certificat" required>
        </div>
        <div class="form-group">
            <label for="documents">Charger des documents :</label>
            <input type="file" id="documents" name="certificat_medical"  multiple>
        </div>
        <button type="submit">Valider</button> <button type="reset">Réinitialiser</button>
    </form>
</body>
</html>