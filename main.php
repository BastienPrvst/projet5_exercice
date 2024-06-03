<?php

include 'DBConnect.php';
include 'ContactManager.php';

$db = getPDO();
$allContacts = findAll($db);



while (true) {
    $line = readline("Entrez votre commande : ");
    if ($line == "list"){
        echo "Affichage de la liste :\n";
    }else{
        echo "Vous avez saisi : $line\n";
    }


    if ($line = "test"){
        var_dump($allContacts);
    }


}