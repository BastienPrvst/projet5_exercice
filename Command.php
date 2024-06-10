<?php

require_once "DBConnect.php";
require_once "ContactManager.php";

class Command
{

    public function list(): array
    {
        $db = DBConnect::getPDO();
        $contactManager = new ContactManager($db);
        return $contactManager->findAll();
    }

    public function create(?string $name, ?string $email, ?string $phoneNumber): void
    {
        try {
            $db = DBConnect::getPDO();
            $contactManager = new ContactManager($db);
            $contactManager->createContact($name, $email, $phoneNumber);
        }
        catch (Exception $e){
            echo 'Erreur lors de la création du contact !' . $e->getMessage();
            return;
        }

        echo <<<EOT
        
            Le contact au nom de :  $name 
            avec l'email : $email  
            et le téléphone : $phoneNumber 
            à été crée avec succès !
            
            
        EOT;

    }
}