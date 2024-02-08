<!DOCTYPE html>

<?php 
    
    //récupère les données du formulaire
    $idHero = $_POST['hero'];
    $idMechant = $_POST['mechant'];

    //récupère les données des personnages
    $hero = $monManager->getOnePerso($idHero);
    $mechant = $monManager->getOnePerso($idMechant);

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_fight.css">
    <title>Demon Fighter</title>
</head>
<body>
    <h1>Combat entre <?php echo $hero->getNom_perso() ?> et <?php echo $mechant->getNom_perso() ?></h1>
    
    <main>
        <div class=heroDiv>
            <img src="img/<?= $hero->getImg_perso() ?>" alt=""> 
            <h2><?php echo $hero->getNom_perso() ?></h2>
            <p>Points de vie : <?php echo $hero->getPv_perso() ?></p>
            <p>Attaque : <?php echo $hero->getAtk_perso() ?></p>
        </div>
        <div class="mechantDiv">
            <img src="img/<?= $mechant->getImg_perso() ?>" alt=""> 
            <h2><?php echo $mechant->getNom_perso() ?></h2>
            <p>Points de vie : <?php echo $mechant->getPv_perso() ?></p>
            <p>Attaque : <?php echo $mechant->getAtk_perso() ?></p>
        </div>
    </main>
    
</body>
</html>