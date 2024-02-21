<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_add.css">
    <title>Modifier un personnage - Demon Fighter</title>
</head>
<body>
    <h1>Modifier le personnage</h1>
    <a href="index.php?page=allPerso" class="bouton retour">«-Retour</a>

    <form action="index.php?page=modifyPerso" method="POST" id="edit">
        <div class="img">
            <img src="<?= $perso->getImg_perso() ?>" alt="">
            <label for="img">Image :</label>
            <input type="text" name="img_perso" id="img" value="<?= $perso->getImg_perso() ?>" required>
        </div>
        <div class="info">
            <input type="hidden" name="id_perso" value="<?= $perso->getId_perso() ?>">
            <label for="nom">Nom du personnage :</label>
            <input type="text" name="nom_perso" id="nom" value="<?= $perso->getNom_perso() ?>" required>
            <label for="type">Type :</label>
            <select name="type_perso" id="type" required>
                <option value="Hero" <?php if ($perso->getType_perso() == "Hero") { echo "selected"; } ?>>Héros</option>
                <option value="Mechant" <?php if ($perso->getType_perso() == "Mechant") { echo "selected"; } ?>>Méchant</option>
            </select>
            <label for="pv">Points de vie :</label>
            <input type="number" name="pv_perso" id="pv" value="<?= $perso->getPV_perso() ?>" required>
            <label for="atk">Attaque :</label>
            <input type="number" name="atk_perso" id="atk" value="<?= $perso->getATK_perso() ?>" required>

            <!-- Apparait que si le type est "Hero" -->
            <label for="bonus" id="labelBonus" style="display: none;">Attaque bonus :</label>
            <input type="number" name="bonus_perso" id="bonus" style="display: none;" value="<?= $perso->getBonus_perso() ?>">

            <input type="submit" value="Modifier">
        </div>
    </form>
</body>

<script>
    window.onload = function() {

        var type = document.getElementById('type');
        var bonus = document.getElementById('bonus');
        var labelBonus = document.getElementById('labelBonus');

        if (type.value === 'Hero') {
            bonus.style.display = "block";
            labelBonus.style.display = "block";
        } else {
            bonus.style.display = "none";
            labelBonus.style.display = "none";
        }

        type.addEventListener('change', function() {
            if (type.value == "Hero") {
                bonus.style.display = "block";
                labelBonus.style.display = "block";
            } else {
                bonus.style.display = "none";
                labelBonus.style.display = "none";
            }
        });
    }

</script>
</html>