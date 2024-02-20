<?php 
    $perso = $monManager->getAllPerso();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_start.css">
    <title>Demon Fighter</title>
</head>
<body>
    <h1 id="h4">Choisi tes combattants !</h1>
    <form action="index.php?page=fight" method="POST">
        <div>

            <select name="hero" id="hero">
                <?php
                    foreach ($perso as $key => $value) {
                        if ($value['type_perso'] == "Hero") {
                            echo "<option value='" . htmlspecialchars($value['id_perso']) . "' data-img='" . htmlspecialchars($value['img_perso']) . "'>" . htmlspecialchars($value['nom_perso']) . "</option>";
                        }
                    }
                ?>
            </select>
            <h2>VS</h2>
            <select name="mechant" id="mechant">
            <?php
                    foreach ($perso as $key => $value) {
                        if ($value['type_perso'] == "Mechant") {
                            echo "<option value='" . htmlspecialchars($value['id_perso']) . "'>" . htmlspecialchars($value['nom_perso']) . "</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <input type="submit" value="Play !">
    </form>

    <section>
        <a href="index.php?page=allPerso" class="bouton liste">Liste des personnages</a>
        <a href="index.php?page=addPerso" class="bouton ajout">Ajouter un personnage</a>
    </section>  
</body>


</html>
