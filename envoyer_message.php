<div class="card">
    


    <div class="card-body">

    <h1> Message bien reçu ! </h1>
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo strip_tags($_POST['email']); ?></p>
        <p class="card-text"><b>Message</b> : <?php echo strip_tags($_POST['message']); ?></p> 
        <!-- stip_tags pour empêcher l'écriture de code depuis le formulaire -->


        <?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['screenshot']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['screenshot']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['screenshot']['tmp_name'], 'C:/uploads/');
                        echo "L'envoi a bien été effectué !";
                }
                else {
                    echo "non";
                }
        }
}
?>

 <?php if (isset($_FILES['photo_alerte']) && !$_FILES['photo_alerte']['error'] && $_FILES['photo_alerte']['size'] <= '5000000') : 
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur et s'il n'est pas trop gros 
    ?>
<?php 
 // Testons si l'extension est autorisée
$fileInfo = pathinfo($_FILES['photo_alerte']['name']);
$extension = $fileInfo['extension']; 
?>
    <?php 
    if (in_array($extension, ['jpg', 'jpeg', 'gif', 'png'])) : 
    ?>
        <?php 
        move_uploaded_file($_FILES['photo_alerte']['tmp_name'], 'uploads/' . basename($_FILES['photo_alerte']['name'])); 
        // On peut valider le fichier et le stocker définitivement
        ?>

        <p> l'envoi a bien était effectué. </p> 

    <?php else : ?>

        <p> Veuillez vérifier la taille et le format du fichier </p>

    <?php endif; ?>

<?php endif; ?>
 //Ma version des faits


    </div>



</div>

