<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Formulaire d'inscription</title>

    <link rel="stylesheet" href="styleinscription.css">

</head>

<body>

    <header>

        <nav>

            <h1>Inscription Plongée</h1>

        </nav>

      </header>

   

    <form method="POST" action="post_inscription.php">

        <div class="form-group">

            <label for="nom">Nom :</label>

            <input type="text" id="nom" name="nom" required>

        </div>

        <div class="form-group">

            <label for="prenom">Prénom :</label>

            <input type="text" id="prenom" name="prenom" required>

        </div>

       

        <button type="submit">Valider</button> <button type="reset">Réinitialiser</button>

    </form>

</body>

</html>

Dispose d’un menu contextuel