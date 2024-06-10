<?php

require_once "Command.php";

$command = new Command();

while (true) {

    $line = readline("Entrez votre commande (help, list, detail [id], create, delete, quit) :");

    if ($line == "list"){

        //Code pour List

        $allContacts = $command->list();
        echo "{ID} | Nom | Email | Télephone\n";
        foreach ($allContacts as $contact) {
            echo "$contact\n";
        }

    } elseif ($line == 'help') {

        //Code pour help

        echo <<<EOT

            help : affiche cette aide
            
            list : liste les contacts
            
            create [name], [email], [phone number] : crée un contact
            
            delete [id] : supprimer le contact
            
            quit : quitte le programme
            
            
        EOT;

    } elseif ($line == 'create') {

        //Code pour create

        $name = readline("Veuillez saisir le nom :");
        $email = readline("Veuillez saisir le mail :");
        $phone = readline("Veuillez saisir le numéro de téléphone : ");

        $command->create($name, $email, $phone);

    } elseif (preg_match("/\bdetail\s(\d+)/", $line, $matches)) {

        //Code pour detail

        $command->detail($matches[1]);

    } elseif (preg_match("/\bdelete\s(\d+)/", $line, $matches)) {

        //Code pour delete

        $delete = null;

        while ($delete !== 'y' && $delete !== 'n') {

            $delete = readline("Voulez-vous vraiment supprimer ce contact ? y/n: ");

            echo "Veuillez saisir 'y' pour oui ou 'n' pour non.\n";

        }

        if ($delete == "y") {

            $command->delete($matches[1]);
            echo "Contact supprimé !\n";
        }else{
            echo "Suppression annulée. \n";
        }

    } elseif ($line == 'quit') {
        break;
    } else {
        echo "Vous avez saisi : $line\n";
    }



}