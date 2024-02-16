<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_add.css">
    <title>Ajouter un Perso - Demon Fighter</title>
</head>
<body>
    <h1>Ajouter un personnage</h1>
    <a href="index.php?page=start" class="retour">«- Retour</a>
    <form action="index.php?page=addPerso" method="POST">
        <label for="nom">Nom du personnage :</label>
        <input type="text" name="nom_perso" id="nom" required>
        <label for="type">Type :</label>
        <select name="type_perso" id="type" required>
            <option value="Hero">Héros</option>
            <option value="Mechant">Méchant</option>
        </select>
        <label for="pv">Points de vie :</label>
        <input type="number" name="pv_perso" id="pv" required>
        <label for="atk">Attaque :</label>
        <input type="number" name="atk_perso" id="atk" required>

        <!-- Apparait que si le type est "Hero" -->
        <label for="bonus" id="labelBonus" style="display: none;">Attaque bonus :</label>
        <input type="number" name="bonus_perso" id="bonus" style="display: none;">

        <label for="img">Image :</label>
        <input type="text" name="img_perso" id="img" required>
        <input type="submit" value="Ajouter">
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