<?php 
    $perso = $monManager->getAllPerso();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demon Fighter</title>
</head>
<body>
    <h1>Choisi tes joueurs !</h1>
    <form action="index.php?page=fight" method="POST">
        <select name="hero" id="hero">
            <?php
                foreach ($perso as $key => $value) {
                    if ($value['type_perso'] == "Hero") {
                        echo "<option value='" . htmlspecialchars($value['id_perso']) . "'>" . htmlspecialchars($value['nom_perso']) . "</option>";
                    }
                }
            ?>
        </select>
        <select name="mechant" id="mechant">
        <?php
                foreach ($perso as $key => $value) {
                    if ($value['type_perso'] == "Mechant") {
                        echo "<option value='" . htmlspecialchars($value['id_perso']) . "'>" . htmlspecialchars($value['nom_perso']) . "</option>";
                    }
                }
            ?>
        </select>
        <input type="submit" value="Fight !">
    </form>
    
</body>
<footer>
    <a href="index.php?page=allPerso" class="bouton liste">Liste des personnages</a>
</footer>
</html>