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
    <h1>Liste des Personnages</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>PV</th>
            <th>ATK</th>
        </tr>
        <?php 
            foreach ($perso as $key => $value) {
                if ($value['type_perso'] == "Hero") {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($value['nom_perso']) . "</td>"; 
                    echo "<td>" . htmlspecialchars($value['pv_perso']) . "</td>";  
                    echo "<td>" . htmlspecialchars($value['atk_perso']) . "</td>"; 
                    echo "<td><a href='modifyPerso.php?id=" . htmlspecialchars($value['id_perso']) . "'>Modifier</a></td>";
                    echo "<td><a href='deletePerso.php?id=" . htmlspecialchars($value['id_perso']) . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce personnage ?\")'>Supprimer</a></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>

    <br>
    <table>
        <tr>
            <th>Nom</th>
            <th>PV</th>
            <th>ATK</th>
        </tr>
        <?php 
            foreach ($perso as $key => $value) {
                if ($value['type_perso'] == "Mechant") {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($value['nom_perso']) . "</td>"; 
                    echo "<td>" . htmlspecialchars($value['pv_perso']) . "</td>";  
                    echo "<td>" . htmlspecialchars($value['atk_perso']) . "</td>"; 
                    echo "<td><a href='modifyPerso.php?id=" . htmlspecialchars($value['id_perso']) . "'>Modifier</a></td>";
                    echo "<td><a href='deletePerso.php?id=" . htmlspecialchars($value['id_perso']) . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce personnage ?\")'>Supprimer</a></td>";
                    echo "</tr>";
                }
            }
        ?>

    </table>
    
</body>
</html>



