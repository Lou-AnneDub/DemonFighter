<?php
    $perso = $monManager->getAllPerso();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_allPerso.css">
    <title>Liste Personnages - Demon Fighter</title>
</head>
<body>
    <h1>Liste des Personnages</h1>
    <a href="index.php?page=start" class="retour">«- Retour</a>
    <section class="listPerso">
        <div class="heros">
            <h2>Héros</h2>
            <?php
                foreach ($perso as $key => $value) {
                    if ($value['type_perso'] == "Hero") {
                    ?>
                        <div class="perso">
                            <img src="<?= $value['img_perso'] ?>" alt=""> 
                            <div>
                                <h3><?php echo $value['nom_perso'] ?></h3>
                                <p>Points de vie : <?php echo $value['pv_perso'] ?></p>
                                <p>Attaque : <?php echo $value['atk_perso'] ?></p>
                                <p>Bonus : <?php echo $value['bonus_perso'] ?></p>
                                <div class="button">
                                    <a href="index.php?page=editPerso&id=<?= $value['id_perso'] ?>">Modifier</a>
                                    <form action="index.php?page=deletePerso" method="POST">
                                        <input type="hidden" name="id" value="<?= $value['id_perso'] ?>">
                                        <button type="submit">Supprimer</button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    <?php
                    }
                }
            ?>
        </div>
        <div class="mechants">
            <h2>Méchants</h2>
            <?php
                foreach ($perso as $key => $value) {
                    if ($value['type_perso'] == "Mechant") {
                    ?>
                        <div class="perso">
                            <img src="<?= $value['img_perso'] ?>" alt=""> 
                            <div class="text">
                                <h3><?php echo $value['nom_perso'] ?></h3>
                                <p>Points de vie : <?php echo $value['pv_perso'] ?></p>
                                <p>Attaque : <?php echo $value['atk_perso'] ?></p>
                                <div class="button">
                                    <a href="index.php?page=editPerso&id=<?= $value['id_perso'] ?>">Modifier</a>
                                    <form action="index.php?page=deletePerso" method="POST">
                                        <input type="hidden" name="id" value="<?= $value['id_perso'] ?>">
                                        <button type="submit">Supprimer</button>
                                    </form>
                                </div>
                                
                            </div>
                            
                        </div>

                    <?php
                    }
                }
            ?>
        </div>
    </section>
    
</body>
</html>



