<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fin du Combat - Demon Fighter</title>
</head>
<body>
    <a href="index.php?page=start" class="bouton retour">Retour</a>
    <?php
        // Vérifiez si la variable $gagnant est définie
        if (isset($gagnant)) {
    ?>
    <h1><?php echo $gagnant->getNom_perso(); ?> a gagné !</h1>
    
    <div class="details">
        <img src="img/<?php echo $gagnant->getImg_perso(); ?>" alt="Image du gagnant">
    </div>
    <?php
        } else {
            // Gestion d'erreur si $gagnant n'est pas défini
            echo "Erreur : Aucun gagnant n'est défini.";
        }
    ?>

    <?php
        // Réinitialisez la session après la fin du combat
        session_unset();
        session_destroy();
    ?>
</body>
</html>
