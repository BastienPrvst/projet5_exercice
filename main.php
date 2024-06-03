<?php

require_once "Command.php";

$command = new Command();

while (true) {

    $line = readline("Entrez votre commande (help, list, detail, create, delete, quit) :");

    //Si list
    if ($line == "list"){

        $allContacts = $command->list();
        echo "{ID} | Nom | Email | Télephone\n";
        foreach ($allContacts as $contact) {
            echo "$contact\n";
        }

    } elseif ($line == 'help') {

        echo <<<EOT

            help : affiche cette aide
            
            list : liste les contacts
            
            create [name], [email], [phone number] : crée un contact
            
            delete [id] : supprimer le contact
            
            quit : quitte le programme
            
            
        EOT;

    } elseif ($line == 'create') {

        $name = readline("Veuillez saisir le nom :");
        $email = readline("Veuillez saisir le mail :");
        $phone = readline("Veuillez saisir le numéro de téléphone : ");

        $command->create($name, $email, $phone);

        echo $name . " | email : " . $email . " | phone : " . $phone . "\n";


    } elseif ($line == 'delete') {

    } elseif ($line == 'quit') {
        break;
    }else{
        echo "Vous avez saisi : $line\n";
    }



}