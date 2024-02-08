<?php
    // Page index + controller
    include 'init.php';
    session_start();

    // Obtenez le paramètre de page de l'URL
    $page = isset($_GET['page']) ? $_GET['page'] : 'start';

    switch ($page) {
        case 'start':
            include 'views/start.php';
            break;
        default:
            include 'views/start.php';
            break;
        case 'fight':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['direct'])) {
             
                include 'views/fight.php';
            }
            break;
        case 'allPerso':
            include 'views/allPerso.php';
            break;
        case 'deletePerso':
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $idToDelete = $_POST['id'];
                $success = $monManager->deletePerso($idToDelete);
        
                if ($success) {
                    echo "Personnage supprimé avec succès.";
                } else {
                    echo "Erreur lors de la suppression du personnage.";
                }
            } else {
                echo "L'ID du personnage à supprimer n'est pas spécifié.";
            }
            break;
        case 'addPerso':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $newPerso = new Perso($_POST);
                $success = $monManager->addPerso($newPerso);
        
                if ($success) {
                    echo "Personnage ajouté avec succès.";
                } else {
                    echo "Erreur lors de l'ajout du personnage.";
                }
            }
            include 'views/addPerso.php';
            break;
        case 'editPerso':
                // Vérifiez si l'ID est défini dans l'URL
                if (isset($_GET['id'])) {
                    $idToEdit = $_GET['id'];
            
                    // Récupérez les informations du personnage à modifier
                    $perso = $monManager->getOnePerso($idToEdit);
            
                    // Incluez la vue pour modifier le personnage
                    include 'views/editPerso.php';
                } else {
                    echo "L'ID du personnage à modifier n'est pas spécifié.";
                }
                break;
        case 'modifyPerso':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $newPerso = new Perso($_POST);
                $success = $monManager->modifyPerso($newPerso);
        
                if ($success) {
                    header('Location: index.php?page=allPerso');

                } else {
                    echo "Erreur lors de la modification du personnage.";
                }
            }
            break;


        
    }

?>