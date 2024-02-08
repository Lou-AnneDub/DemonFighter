<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Perso - Demon Fighter</title>
</head>
<body>

    <h1>Ajouter un personnage</h1>
    <form action="index.php?page=addPerso" method="POST">
        <label for="nom">Nom du personnage</label>
        <input type="text" name="nom_perso" id="nom" required>
        <label for="type">Type de personnage</label>
        <select name="type_perso" id="type" required>
            <option value="Hero">Héros</option>
            <option value="Mechant">Méchant</option>
        </select>
        <label for="pv">Points de vie</label>
        <input type="number" name="pv_perso" id="pv" required>
        <label for="atk">Attaque</label>
        <input type="number" name="atk_perso" id="atk" required>
        <label for="img">Image</label>
        <input type="text" name="img_perso" id="img" required>
        <input type="submit" value="Ajouter">
    </form>
    <a href="index.php?page=start" class="bouton retour">Retour</a>
    
</body>
</html>