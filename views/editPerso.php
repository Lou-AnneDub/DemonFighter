<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un personnage - Demon Fighter</title>
</head>
<body>
    <h1>Modifier un personnage</h1>
    <form action="index.php?page=modifyPerso" method="POST">
        <input type="hidden" name="id_perso" value="<?= $perso->getId_perso() ?>">
        <label for="nom">Nom du personnage</label>
        <input type="text" name="nom_perso" id="nom" value="<?= $perso->getNom_perso() ?>" required>
        <label for="type">Type de personnage</label>
        <select name="type_perso" id="type" required>
            <option value="Hero" <?php if ($perso->getType_perso() == "Hero") { echo "selected"; } ?>>Héros</option>
            <option value="Mechant" <?php if ($perso->getType_perso() == "Mechant") { echo "selected"; } ?>>Méchant</option>
        </select>
        <label for="pv">Points de vie</label>
        <input type="number" name="pv_perso" id="pv" value="<?= $perso->getPV_perso() ?>" required>
        <label for="atk">Attaque</label>
        <input type="number" name="atk_perso" id="atk" value="<?= $perso->getATK_perso() ?>" required>
        <input type="submit" value="Modifier">
    </form>
    <a href="index.php?page=allPerso" class="bouton retour">Retour</a>
    
</body>
</html>