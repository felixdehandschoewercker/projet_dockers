 <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8"/>
            <title></title>
            <link rel="stylesheet" href="styleauthentification.css"/>
        </head>
        <br>
        <br>
        <body>
        <div class="container">
        <img class="logo" src="media/LOGO_ddd_black.png">
            <br>
            <br>
            <form id="loginForm" action="login.php" method="post">
            <input type="email" id="username" name="username" placeholder="email" required>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>

            <input type="submit" value="Se connecter">
           

            </form>

            <a href="créer une page qui permettra la récup de mdp(a faire biensur)">Mot de passe oublié ?</a>
           <p>---</p> Vous n'avez pas de compte ? <a href="inscription.php">S'inscrire</a>
        </div>


        </body>
    </html>