<?php

// Déclaration du tableau des recettes

$plongeurs = [
    ['N1','[...]','mickael.andrieu@exemple.com',true,],
    ['E3','[...]','mickael.andrieu@exemple.com',false,],
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
</head>
<body>
    <ul>
        <?php for ($lines = 0; $lines <= 1; $lines++): ?>
            <li><?php echo $plongeurs[$lines][0] . ' (' . $plongeurs[$lines][2] . ')'; ?></li>
        <?php endfor; ?>
    </ul>
</body>
</html>