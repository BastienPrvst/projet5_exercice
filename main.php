<?php

require 'DBConnect.php';
require 'ContactManager.php';

$db = DBConnect::getPDO();
$contactManager = new ContactManager($db);


while (true) {
    $line = readline("Entrez votre commande : ");
    if ($line == "list"){

        $allContacts = $contactManager->findAll();

        echo "Affichage de la liste :\n";
        var_dump($allContacts);
    }else{
        echo "Vous avez saisi : $line\n";
    }



}