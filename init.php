<?php

    function chargerClasse($PersoManager){
        require 'class/'.$PersoManager.'.php';
    }
    spl_autoload_register('chargerClasse');

    $db=new PDO('mysql:host=localhost;dbname=Fighter;charset=utf8', 'root', 'root');

    $monManager = new PersoManager($db);

?>