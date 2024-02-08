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
                exit;
            }
            break;
        case 'allPerso':
            include 'views/allPerso.php';
            break;
        
    }


?>