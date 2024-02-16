<!DOCTYPE html>

<?php 
    $resultatDuTour = '';

    $tourActuel = isset($_SESSION['tourCombat']) ? $_SESSION['tourCombat'] : 'hero';

    if (!isset($_SESSION['pvHero'])) {
        $_SESSION['pvHero'] = $hero->getPv_perso();
    }

    if (!isset($_SESSION['pvMechant'])) {
        $_SESSION['pvMechant'] = $mechant->getPv_perso();
    }

    // Vérifiez si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tourCombat'])) {
        if ($_POST['tourCombat'] === 'Attaque') {
            if ($tourActuel === 'hero') {
                $degatsDuMechant = $hero->getAtk_perso(); 
                $pvMechantActuels = $_SESSION['pvMechant'];
                $_SESSION['pvMechant'] = max(0, $pvMechantActuels - $degatsDuMechant);
                $resultatDuTour = "Le héros attaque le méchant et lui inflige $degatsDuMechant dégâts.";
            } else {
                $degatsDuHero = $mechant->getAtk_perso(); 
                $pvHeroActuels = $_SESSION['pvHero'];
                $_SESSION['pvHero'] = max(0, $pvHeroActuels - $degatsDuHero);
                $resultatDuTour = "Le méchant contre-attaque et inflige $degatsDuHero dégâts au héros.";
            }
        } elseif ($_POST['tourCombat'] === 'Soigner') {
            if ($tourActuel === 'hero') {
                $_SESSION['pvHero'] = min($hero->getPv_perso(), $_SESSION['pvHero'] + 10);
                $resultatDuTour = "Le héros se soigne de 10 points de vie.";
            }
        } elseif ($_POST['tourCombat'] === 'BonusAtk') {
            $degatsDuMechant = $hero->getBonus_perso(); 
            $pvMechantActuels = $_SESSION['pvMechant'];
            $_SESSION['pvMechant'] = max(0, $pvMechantActuels - $degatsDuMechant);
            $resultatDuTour = "Le héros attaque le méchant avec son attaque spéciale et lui inflige $degatsDuMechant dégâts.";
        } elseif ($_POST['tourCombat'] === 'BonusSoin') {
            $_SESSION['pvHero'] = min($hero->getPv_perso(), $_SESSION['pvHero'] + 30);
            $resultatDuTour = "Le héros se soigne de 30 points de vie.";
        }

        $_SESSION['tourCombat'] = ($tourActuel === 'hero') ? 'mechant' : 'hero';
    }

    // Augmenter les points de vie du méchant toutes les 5 secondes
    if (!isset($_SESSION['lastHealthIncrease'])) {
        $_SESSION['lastHealthIncrease'] = time();
    }
    
    $timeSinceLastIncrease = time() - $_SESSION['lastHealthIncrease'];
    
    if ($timeSinceLastIncrease >= 5) {
        $mechant->setPv_perso($mechant->getPv_perso() + 1);
        $_SESSION['lastHealthIncrease'] = time();
    }

    // Vérifiez si l'un des personnages a atteint 0 points de vie et définir celui restant comme gagnant
    if ($_SESSION['pvHero'] <= 0) {
        $_SESSION['gagnant'] = $mechant;
        header('Location: index.php?page=end');
        exit;
    }elseif ($_SESSION['pvMechant'] <= 0) {
        $_SESSION['gagnant'] = $hero;
        header('Location: index.php?page=end');
        exit;
    }
    

?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style_fight.css">
        <title>Demon Fighter</title>
    </head>
    <body>
        <h1><?php echo $hero->getNom_perso() ?> <span>VS</span> <?php echo $mechant->getNom_perso() ?></h1>

        <p><?php echo $resultatDuTour; ?></p>
        
        <main>
            <section class="fight">
                <div class="perso hero">
                    <h2><?php echo $hero->getNom_perso() ?></h2>
                    <p><?php echo $_SESSION['pvHero']; ?></p>
                    <div class="barreVie <?php echo ($tourActuel === 'hero') ? '' : 'tour'; ?> ">
                        <div class="vie" style="width: <?php echo min(100, max(0, ($_SESSION['pvHero']/$hero->getPv_perso())*100)) ?>%;"></div>
                    </div>
                    <img src="img/<?= $hero->getImg_perso() ?>" alt=""> 
                </div>
                <div class="perso mechant">
                    
                    <h2><?php echo $mechant->getNom_perso() ?></h2>
                    <p><?php echo $_SESSION['pvMechant']; ?></p>
                    <div class="barreVie <?php echo ($tourActuel === 'mechant') ? '' : 'tour'; ?>">
                        <div class="vie" style="width: <?php echo min(100, max(0, ($_SESSION['pvMechant']/$mechant->getPv_perso())*100)) ?>%;"></div>
                    </div>
                    <img src="img/<?= $mechant->getImg_perso() ?>" alt=""> 
                </div>
            </section>
            <section>
                <form action="index.php?page=fight" method="post">
                    <input type="hidden" name="hero" value="<?php echo $idHero; ?>">
                    <input type="hidden" name="mechant" value="<?php echo $idMechant; ?>">
                    <input type="hidden" name="joueurActuel" value="<?php echo (isset($_POST['joueurActuel']) && $_POST['joueurActuel'] === "hero") ? "hero" : "mechant"; ?>">
                    <input type="submit" name="tourCombat" value="Attaque">
                </form>  

                <!-- Afficher le bouton Soigner seulement si c'est le tour du héros -->
                <?php if ($_SESSION['tourCombat'] === 'hero'): ?>
                    
                    <form action="index.php?page=fight" method="post">
                        <input type="hidden" name="hero" value="<?php echo $idHero; ?>">
                        <input type="hidden" name="mechant" value="<?php echo $idMechant; ?>">
                        <input type="submit" name="tourCombat" value="Soigner">
                    </form>
                <?php endif; ?>
                <!-- Afficher le bouton Bonus seulement si c'est le tour du héros -->
                <?php if ($_SESSION['tourCombat'] === 'hero'): ?>
                    <form action="index.php?page=fight" method="post">
                        <input type="hidden" name="hero" value="<?php echo $idHero; ?>">
                        <input type="hidden" name="mechant" value="<?php echo $idMechant; ?>">
                        <input type="submit" name="tourCombat" value="BonusAtk">
                    </form>
                <?php endif; ?>
                <!-- Afficher le bouton Bonus seulement si c'est le tour du héros et si le hero a moins de 15pv et si le bonus de soin n'a pas encore été utilisé -->
                <?php if ($_SESSION['tourCombat'] === 'hero' && $_SESSION['pvHero'] <= 15): ?>
                    <form action="index.php?page=fight" method="post">
                        <input type="hidden" name="hero" value="<?php echo $idHero; ?>">
                        <input type="hidden" name="mechant" value="<?php echo $idMechant; ?>">
                        <input type="submit" name="tourCombat" value="BonusSoin">
                    </form>
                <?php endif; ?>
            </section>

        </main>
        
        
    </body>

<script>
    setInterval(function() {
        // Effectuez une requête AJAX pour mettre à jour les points de vie du méchant
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "update_health.php", true);
        xhr.send();
    }, 5000); 
</script>
</html>